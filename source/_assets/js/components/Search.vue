<template>
    <div class="relative flex flex-col w-full items-end mr-4">
        <div v-if="modal" class="relative md:hidden flex flex-col items-center overlay is-open pt-16">
           <portal-target name="search-1"></portal-target>
        </div>

        <div v-if="! modal">
            <portal-target name="search-2"></portal-target>
        </div>

        <portal
            v-for="index in 2"
            :key="index"
            :to="'search-' + index"
            target-class="flex w-full md:justify-end"
        >
            <label for="search" class="hidden">Search</label>

            <input
                id="search"
                v-model="query"
                class="transition-fast w-full md:w-1/2 md:focus:w-3/4 bg-grey-lighter border border-grey focus:border-blue-light outline-none cursor-pointer px-2 md:px-4 py-2"
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
                class="absolute flex justify-end text-blue-darker appearance-none active:border-0 mt-2 -ml-6"
                @click="reset"
            >x</button>

            <transition name="fade">
                <div v-if="query" class="absolute flex flex-col w-full md:w-3/4 bg-white border border-b-0 border-blue-light rounded-b-lg shadow mt-9">
                    <a
                        v-for="(result, index) in results"
                        :href="result.link"
                        :title="result.title"
                        class="transition-fast bg-white hover:bg-grey-lightest border-b border-blue-light text-xl cursor-pointer px-10 py-3"
                        :key="result.link"
                        :class="{ 'rounded-b-lg' : (index === results.length - 1) }"
                        @mousedown.prevent
                    >
                        {{ result.title }}

                        <span class="block text-grey-dark text-sm my-1">{{ result.snippet }}</span>
                    </a>

                    <div
                        v-if="! results.length"
                        class="transition-fast bg-white hover:bg-grey-lightest border-b border-blue-light rounded-b-lg shadow cursor-pointer px-6 py-3"
                    >
                        <p>No results for <strong>{{ query }}</strong></p>
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
        reset() {
            this.query = '';
        },
    },
    created() {
        // document.body.className += ' ' + 'fixed overflow-hidden';

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

.overlay {
  position: fixed;
  overflow: scroll;
  top: 0;
  left: 0;
  z-index: 2;
  width: 100%;
  height: 100%;
background: rgba(250, 250, 250, 0.96);
  opacity: 0;
  transition: .3s linear;
  transform: translateY(-100%);
}
.overlay.is-open {
  opacity: 1;
  visibility: visible;
  transform: translateY(0);
}

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
</style>
