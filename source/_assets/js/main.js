window.Vue = require('vue');

Vue.config.productionTip = false;

new Vue({
    methods: {
        urlIsActive(url) {
            return window.location.href.indexOf(url) > -1;
        }
    }
}).$mount('#vue-app');

