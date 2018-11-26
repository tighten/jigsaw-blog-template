<template>
	<div class="flex flex-col my-12 items-center">
		<input v-model="query"
			@keyup.enter="search"
			type="text"
			name="search"
			placeholder="Search"
			autocomplete="off"
			class="w-3/4 px-6 py-4 bg-white focus:bg-grey-lighter border rounded outline-none cursor-pointer transition-fast focus:rounded-b-none">

		<div v-if="results" class="absolute w-3/4 mt-16 flex flex-col">
			<div v-for="result in results" class="px-6 py-2 bg-grey-lightest border border-t-0 cursor-pointer hover:bg-grey-lighter transition-fast">
				<a :href="result.link" :title="result.title">{{ result.title }}</a>

				<p class="my-1 text-grey text-xs">{{ result.snippet }}</p>
			</div>


		</div>
	<!-- 	<div v-else="!results && query != ''" class="flex flex-col w-3/4">
			<h5>We didn't find anything for <span>query</span>. Please try again</h5>
		</div> -->
	</div>
</template>

<script type="text/javascript">
export default {
	props: {
		url: {
			type: String,
			required: true
		}
	},

	data() {
		return {
			query : '',
			results : null,
		}
	},

	computed: {
		searchUrl() {
			return this.url + '&q=' + this.query;
		}
	},

	methods: {
		search() {
			axios.get(this.searchUrl)
		    	.then((response)  => {
		    	this.results = response.data.items.slice(0,5);
	      	});

		   console.log(this.results);
		}
	}
}
</script>
