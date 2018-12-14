<template>
    <div class="relative flex flex-col w-full items-end mr-4">
        <div :class="modal ? 'overlay fixed md:hidden pin-t pin-l flex flex-col w-full h-full items-center overflow-scroll opacity-100 z-10 pt-7 px-4' : 'hidden md:block w-full'">
            <div class="relative flex flex-col w-full items-end">
                <label for="search" class="hidden">Search</label>

                <input
                    id="search"
                    v-model="query"
                    ref="search"
                    class="transition-fast relative block h-10 w-full md:w-1/2 md:focus:w-3/4 bg-grey-lightest border border-grey focus:border-blue-light outline-none cursor-pointer px-4 py-2"
                    :class="{ 'transition-border': query }"
                    autocomplete="off"
                    name="search"
                    placeholder="Search"
                    type="text"
                    @keyup.esc="reset"
                    @blur="reset"
                >

                <button
                    v-if="query || modal"
                    class="absolute h-full font-light text-3xl text-blue hover:text-blue-dark focus:outline-none -mt-px pr-3"
                    @click="reset"
                >&times;</button>

                <transition name="fade">
                    <div v-if="query" class="absolute flex flex-col w-full md:w-3/4 bg-white border border-b-0 border-t-0 border-blue-light rounded-b-lg shadow-lg mt-10 mb-4">
                        <a
                            v-for="(result, index) in results"
                            class="bg-white hover:bg-blue-lightest border-b border-blue-light text-xl cursor-pointer p-4"
                            :class="{ 'rounded-b-lg' : (index === results.length - 1) }"
                            :href="result.link"
                            :title="result.title"
                            :key="result.link"
                            @mousedown.prevent
                        >
                            {{ result.title }}

                            <span class="block font-normal text-grey-darker text-sm my-1" v-html="result.snippet"></span>
                        </a>

                        <div
                            v-if="! results.length"
                            class="bg-white hover:bg-blue-lightest border-b border-blue-light rounded-b-lg shadow cursor-pointer p-4"
                        >
                            <p class="my-0">No results for <strong>{{ query }}</strong></p>
                        </div>
                    </div>
                </transition>
            </div>
        </div>

        <button
            title="Start searching"
            type="button"
            class="flex md:hidden bg-grey-lightest hover:bg-blue-lightest justify-center items-center border border-grey rounded-full h-10 px-3"
            @click.prevent="openModal"
        >
            <img src="/assets/img/magnifying-glass.svg" alt="search icon" class="h-4 w-4 max-w-none">
        </button>
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
            document.body.classList.add('fixed');
            this.modal = true;
            this.$nextTick(() => {
                this.$refs.search.focus();
            })
        },
        reset() {
            this.query = '';
            this.modal = false;
            document.body.classList.remove('fixed');
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
    background-image: url('/assets/img/magnifying-glass.svg');
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
    background: rgba(250, 250, 250, 0.94);
}
</style>
