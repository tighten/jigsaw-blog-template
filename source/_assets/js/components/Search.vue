<template>
    <div class="relative flex flex-col w-full items-end mr-4">
        <input
            v-model="query"
            class="w-1/2 focus:w-3/4 bg-grey-lighter focus:bg-grey-lightest border border-grey focus:border-blue-light rounded-full outline-none cursor-pointer transition-fast px-4 py-2"
            :class="{ 'bg-grey-lightest border-blue-light': query }"
            autocomplete="off"
            name="search"
            placeholder="Search"
            type="text"
            @keyup.esc="reset"
            @blur="reset"
        >

        <button
            v-if="query"
            class="flex justify-end text-blue-darker appearance-none active:border-0 -mt-8 mr-10"
            @click="reset"
        >x</button>

        <div v-if="query" class="absolute flex flex-col z-9 w-3/4 mt-8 pt-4">
            <a
                v-for="result in results"
                :href="result.link"
                :title="result.title"
                class="bg-white hover:bg-grey-lighter border border-blue-light border-t-0 text-xl cursor-pointer shadow transition-fast px-10 py-3"
                :key="result.link"
                @mousedown.prevent
            >
                {{ result.title }}

                <span class="block text-grey-dark text-sm my-1">{{ result.snippet }}</span>
            </a>

            <div
                v-if="! results.length"
                class="bg-white hover:bg-grey-lighter border border-t-0 border-blue-light cursor-pointer shadow transition-fast px-6 py-3"
            >
                <p>No results for <strong>{{ query }}</strong></p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            fuse: null,
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
    background: url('/assets/img/magnifying-glass.svg');
    background-position: 0.8em;
    background-repeat: no-repeat;
    text-indent: 1.2em;
}
</style>
