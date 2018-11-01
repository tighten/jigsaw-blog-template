window.Vue = require('vue');
window.hljs = require('highlightjs');

Vue.config.productionTip = false;

new Vue({
    methods: {
        urlIsActive(url) {
            return window.location.href.indexOf(url) > -1;
        }
    },

    mounted() {
        document.querySelectorAll('pre code').forEach((block) => {
            hljs.highlightBlock(block);
        });
    }
}).$mount('#vue-app');

