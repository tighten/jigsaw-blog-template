window.axios = require('axios');
window.fuse = require('fuse.js');
window.Vue = require('vue');

// Syntax highlighting
import hljs from 'highlight.js/lib/highlight';

hljs.registerLanguage('bash', require('highlight.js/lib/languages/bash'));
hljs.registerLanguage('css', require('highlight.js/lib/languages/css'));
hljs.registerLanguage('html', require('highlight.js/lib/languages/xml'));
hljs.registerLanguage('javascript', require('highlight.js/lib/languages/javascript'));
hljs.registerLanguage('json', require('highlight.js/lib/languages/json'));
hljs.registerLanguage('markdown', require('highlight.js/lib/languages/markdown'));
hljs.registerLanguage('php', require('highlight.js/lib/languages/php'));
hljs.registerLanguage('scss', require('highlight.js/lib/languages/scss'));
hljs.registerLanguage('yaml', require('highlight.js/lib/languages/yaml'));

import PortalVue from 'portal-vue';
import Search from './components/Search.vue';

// Vue.js
Vue.config.productionTip = false;
Vue.use(PortalVue);

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
