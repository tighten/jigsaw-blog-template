import Vue from 'vue/dist/vue.esm.js';
import Search from './components/Search.vue';
import hljs from 'highlight.js/lib/core';
import bash from 'highlight.js/lib/languages/bash'
import xml from 'highlight.js/lib/languages/xml'
import php from 'highlight.js/lib/languages/php'
import scss from 'highlight.js/lib/languages/scss'
import yaml from 'highlight.js/lib/languages/yaml'

// Syntax highlighting
hljs.registerLanguage('bash', bash);
hljs.registerLanguage('html', xml);
hljs.registerLanguage('php', php);
hljs.registerLanguage('scss', scss);
hljs.registerLanguage('yaml', yaml);

document.querySelectorAll('pre code').forEach((block) => hljs.highlightElement(block));

Vue.config.productionTip = false;

new Vue({
    components: {
        Search,
    },
}).$mount('#vue-search');

import '../css/main.css'
