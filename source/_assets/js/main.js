window.Vue = require('vue');
window.hljs = require('highlightjs');

import NavigationToggle from './components/navigation-toggle.vue';

Vue.config.productionTip = false;

new Vue({
    components: { NavigationToggle },

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
        document.querySelectorAll('pre code').forEach((block) => {
            hljs.highlightBlock(block);
        });

        this.$root.$on('menu-toggle', data => {
            this.displayMobileNav = data;
        });
    }
}).$mount('#vue-app');

