window.axios = require('axios');
window.fuse = require('fuse.js');
window.hljs = require('highlightjs');
window.Vue = require('vue');

let AOS = require('aos');

import NavigationToggle from './components/NavigationToggle.vue';
import Search from './components/Search.vue';

Vue.config.productionTip = false;

new Vue({
    components: {
        Search,
        NavigationToggle
    },

    data() {
        return {
            displayMobileNav: false,
        }
    },

    methods: {
        urlIsActive(url) {
            return window.location.href.indexOf(url) > -1;
        }
    },

    mounted() {
        AOS.init({
            once: true,
        });

        document.querySelectorAll('pre code').forEach((block) => {
            hljs.highlightBlock(block);
        });

        this.$root.$on('menu-toggle', data => {
            this.displayMobileNav = data;
        });
    }
}).$mount('#vue-app');

