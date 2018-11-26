<template>
	<div class="flex flex-col my-12 items-center" data-aos="fade-left" data-aos-easing="ease-out-back">
		<input type="text"
			v-model="query"
			@keyup="search"
			@keyup.esc="resetSearch"
			placeholder="Search"
			autocomplete="off"
			class="w-3/4 px-6 py-4 bg-grey-lighter focus:bg-grey-lightest border focus:border-blue-light outline-none cursor-pointer transition-fast">

		<div v-if="results" class="absolute flex flex-col w-3/4 pt-4 mt-8 text-grey text-sm">
			<div :key="result.link"
				v-for="result in results"
				class="bg-white hover:bg-grey-lighter px-6 py-3 border border-blue-light border-t-0 cursor-pointer shadow transition-fast">
				<a :href="result.link" :title="result.title" class="text-xl">{{ result.title }}</a>

				<p class="my-1">{{ result.snippet }}</p>
			</div>

			<div v-if="(! results.length) && query != ''"
				class="bg-white hover:bg-grey-lighter px-6 py-3 border border-blue-light border-t-0 cursor-pointer shadow transition-fast">
				<p>We didn't find anything for <strong class="bg-grey-lightest p-2">{{ query }}</strong>. Please try searching again.</p>
			</div>
		</div>
	</div>
</template>

<script type="text/javascript">
export default {
	data() {
		return {
			query: '',
			results : [],
			searchIndex : [],
		}
	},

	computed: {
		fuse() {
			return new fuse(this.searchIndex, {
				minMatchCharLength: 6,
				keys: ['title', 'snippet', 'categories']
			});
		}
	},

	methods: {
		search() {
			this.results = this.query != '' ? this.fuse.search(this.query) : [];
		},

		resetSearch() {
			this.results = [];
			this.query = '';
		}
	},

	mounted() {
		axios('/index.json').then(response => {
			this.searchIndex = response.data;
		})
	}
}
</script>
