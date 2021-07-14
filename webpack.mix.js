const mix = require('laravel-mix');
require('laravel-mix-jigsaw');

mix.disableSuccessNotifications();
mix.setPublicPath('source/assets/build');

mix.js('source/_assets/js/main.js', 'js').vue()
    .css('source/_assets/css/main.css', 'css/main.css', [
        require('postcss-import'),
        require('tailwindcss'),
    ])
    .jigsaw({
        watch: ['config.php', 'source/**/*.md', 'source/**/*.php', 'source/**/*.css'],
    })
    .options({ processCssUrls: false })
    .sourceMaps()
    .version();
