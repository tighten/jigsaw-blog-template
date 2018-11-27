<template>
    <div class="flex flex-col my-12 items-center">
        <input
            v-model="query"
            class="w-3/4 px-6 py-4 bg-grey-lighter focus:bg-grey-lightest border border-grey focus:border-blue-light outline-none cursor-pointer transition-fast"
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
            class="flex justify-end w-3/4 text-grey-darker appearance-none -mt-10 mb-4 mr-10 "
            @click="reset"
        >x</button>

        <div v-if="query" class="flex flex-col w-3/4 pt-4 -mt-4">
            <div
                v-for="result in results"
                class="bg-white hover:bg-grey-lighter px-6 py-3 border border-blue-light border-t-0 cursor-pointer shadow transition-fast"
                :key="result.link"
            >
                <a :href="result.link" :title="result.title" class="text-xl">{{ result.title }}</a>

                <p class="text-grey-dark text-sm my-1">{{ result.snippet }}</p>
            </div>

            <div
                v-if="! results.length"
                class="bg-white hover:bg-grey-lighter px-6 py-3 border border-blue-light border-t-0 cursor-pointer shadow transition-fast"
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
            setTimeout(() => this.query = '', 100);
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
