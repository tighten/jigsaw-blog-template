window.axios = require('axios');
window.Vue = require('vue');
window.hljs = require('highlightjs');

import Search from './components/Search.vue';

Vue.config.productionTip = false;

new Vue({
    components: {
        Search,
    },

    mounted() {
        document.querySelectorAll('pre code').forEach((block) => {
            hljs.highlightBlock(block);
        });
    }
}).$mount('#vue-app');

