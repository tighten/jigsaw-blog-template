<template>
	<div class="flex flex-col my-12 items-center" data-aos="fade-left">
		<input v-model="query"
			@keyup.enter="search"
			type="text"
			name="search"
			placeholder="Search"
			autocomplete="off"
			class="w-1/2 focus:w-3/4 px-6 py-4 bg-grey-lightest focus:bg-grey-lighter border rounded outline-none cursor-pointer transition-fast focus:shadow">

		<div v-if="results" class="flex flex-col w-3/4">
			<div v-for="result in results" class="w-full px-6 py-4 bg-grey-lightest border border-t-0">
				<h5 class="my-2 text-base">{{ result.title }}</h5>
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
		    	this.results = response.data.items;
	      	});

		   console.log(this.results);
		}
	}
}
</script>
