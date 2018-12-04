window.axios = require('axios');
window.fuse = require('fuse.js');
window.hljs = require('highlightjs');
window.Vue = require('vue');

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

