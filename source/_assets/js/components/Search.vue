<template>
	<div class="flex flex-col my-12 items-center" data-aos="fade-left" data-aos-easing="ease-out-back">
		<input type="text"
			v-model="query"
			@keyup="search"
			@keyup.esc="resetSearch"
			placeholder="Search"
			autocomplete="off"
			class="w-3/4 px-6 py-4 bg-grey-lighter focus:bg-grey-lightest border focus:border-blue-light outline-none cursor-pointer transition-fast">

		<div v-if="results" class="absolute w-3/4 pt-4 mt-8 pt-1 flex flex-col text-grey text-sm">
			<div :key="result.link"
				v-for="result in results"
				class="px-6 py-3 bg-white border border-blue-light border-t-0 cursor-pointer hover:bg-grey-lighter transition-fast shadow">
				<a :href="result.link" :title="result.title" class="text-xl">{{ result.title }}</a>

				<p class="my-1">{{ result.snippet }}</p>
			</div>

			<div v-if="(! results.length) && query != ''"
				class="px-6 py-3 bg-white border border-blue-light border-t-0 cursor-pointer hover:bg-grey-lighter transition-fast shadow">
				<p class="">We didn't find anything for <span class="p-2 bg-grey-lightest font-bold">{{ query }}</span>. Please try searching again.</p>
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
			this.searchIndex = response.data[0];
		})
	}
}
</script>
