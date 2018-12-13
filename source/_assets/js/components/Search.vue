<template>
    <div class="relative flex flex-col w-full items-end mr-4">
        <div v-if="modal" class="overlay fixed md:hidden pin-t pin-l flex flex-col w-full h-full items-center overflow-scroll opacity-100 z-10 pt-8 px-4">
           <portal-target name="search-1"></portal-target>
        </div>

        <a
            href="#"
            title="Start searching"
            @click.prevent="openModal"
            class="flex md:hidden bg-grey-lighter justify-center items-center border border-grey rounded-full h-10 px-3"
        >
            <img src="/assets/img/magnifying-glass.svg" alt="search icon" class="h-4 w-4">
        </a>

        <div v-if="! modal" class="hidden md:block w-full">
            <portal-target name="search-2"></portal-target>
        </div>

        <portal
            v-for="index in 2"
            :key="index"
            :to="'search-' + index"
            target-class="relative flex flex-col w-full items-end"
        >
            <label for="search" class="hidden">Search</label>

            <input
                id="search"
                v-model="query"
                ref="search"
                class="transition-fast relative block w-full md:w-1/2 md:focus:w-3/4 bg-grey-lighter border border-grey focus:border-blue-light outline-none cursor-pointer px-4 py-2"
                :class="{ 'transition-border': query }"
                autocomplete="off"
                name="search"
                placeholder="Search"
                type="text"
                @keyup.esc="reset"
                @blur="reset"
            >

            <button
                v-if="query"
                class="absolute flex justify-end text-blue-darker text-xl appearance-none active:border-0 -ml-6 mt-2"
                @click="reset"
            >&times;</button>

            <transition name="fade">
                <div v-if="query" class="absolute flex flex-col w-full md:w-3/4 bg-white border border-b-0 border-blue-light rounded-b-lg shadow mt-9">
                    <a
                        v-for="(result, index) in results"
                        :href="result.link"
                        :title="result.title"
                        class="transition-fast bg-white hover:bg-grey-lightest border-b border-blue-light text-xl cursor-pointer p-3"
                        :key="result.link"
                        :class="{ 'rounded-b-lg': (index === results.length - 1) }"
                        @mousedown.prevent
                    >
                        {{ result.title }}

                        <span class="block text-grey-dark text-sm my-1">{{ result.snippet }}</span>
                    </a>

                    <div
                        v-if="! results.length"
                        class="bg-white hover:bg-blue-lightest border-b border-blue-light rounded-b-lg shadow cursor-pointer p-3"
                    >
                        <p class="my-0">No results for <strong>{{ query }}</strong></p>
                    </div>
                </div>
            </transition>
        </portal>
    </div>
</template>

<script>
export default {
    data() {
        return {
            fuse: null,
            modal: false,
            query: '',
        };
    },
    computed: {
        results() {
            return this.query ? this.fuse.search(this.query) : [];
        },
    },
    methods: {
        openModal() {
            this.modal = true;

            this.$nextTick(() => {
                this.$refs.search[0].focus();
            })
        },
        reset() {
            this.query = '';
            this.modal = false;
        },
    },
    created() {
        axios('/index.json').then(response => {
            this.fuse = new fuse(response.data, {
                minMatchCharLength: 6,
                keys: ['title', 'snippet', 'categories'],
            });
        });
    },
};
</script>

<style>
input[name='search'] {
    background: url('/assets/img/magnifying-glass.svg') #eef3f7;
    background-position: 0.8em;
    background-repeat: no-repeat;
    border-radius: 25px;
    text-indent: 1.2em;
}

input[name='search'].transition-border {
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
    border-top-left-radius: .5rem;
    border-top-right-radius: .5rem;
}

.fade-enter-active {
    transition: opacity .9s;
}

.fade-leave-active {
    transition: opacity 0s;
}

.fade-enter,
.fade-leave-to {
    opacity: 0;
}

.overlay {
  background: rgba(250, 250, 250, 0.96);
}
</style>
