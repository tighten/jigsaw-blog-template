<template>
    <div class="flex flex-1 justify-end items-center text-right px-4">
        <div
            class="absolute md:relative w-full justify-end bg-white pin-l pin-t z-10 mt-7 md:mt-0 px-4 md:px-0"
            :class="{'hidden md:flex': ! searching}"
        >
            <label for="search" class="hidden">Search</label>

            <input
                id="search"
                v-model="query"
                ref="search"
                class="transition-fast relative block h-10 w-full lg:w-1/2 lg:focus:w-3/4 bg-grey-lightest border border-grey focus:border-blue-light outline-none cursor-pointer text-grey-darker px-4 pb-0"
                :class="{ 'transition-border': query }"
                autocomplete="off"
                name="search"
                placeholder="Search"
                type="text"
                @keyup.esc="reset"
                @blur="reset"
            >

            <button
                v-if="query || searching"
                class="absolute pin-t pin-r h-10 font-light text-3xl text-blue hover:text-blue-dark focus:outline-none -mt-px pr-7 md:pr-3"
                @click="reset"
            >&times;</button>

            <transition name="fade">
                <div v-if="query" class="absolute pin-l pin-r md:pin-none w-full lg:w-3/4 text-left mb-4 md:mt-10">
                    <div class="flex flex-col bg-white border border-b-0 border-t-0 border-blue-light rounded-b-lg shadow-lg mx-4 md:mx-0">
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
                            class="bg-white w-full hover:bg-blue-lightest border-b border-blue-light rounded-b-lg shadow cursor-pointer p-4"
                        >
                            <p class="my-0">No results for <strong>{{ query }}</strong></p>
                        </div>
                    </div>
                </div>
            </transition>
        </div>

        <button
            title="Start searching"
            type="button"
            class="flex md:hidden bg-grey-lightest hover:bg-blue-lightest justify-center items-center border border-grey rounded-full focus:outline-none h-10 px-3"
            @click.prevent="showInput"
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
            searching: false,
            query: '',
        };
    },
    computed: {
        results() {
            return this.query ? this.fuse.search(this.query) : [];
        },
    },
    methods: {
        showInput() {
            this.searching = true;
            this.$nextTick(() => {
                this.$refs.search.focus();
            })
        },
        reset() {
            this.query = '';
            this.searching = false;
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
    transition: opacity .5s;
}

.fade-leave-active {
    transition: opacity 0s;
}

.fade-enter,
.fade-leave-to {
    opacity: 0;
}
</style>
