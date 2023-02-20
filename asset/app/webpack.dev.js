/** @format */

const mix = require('laravel-mix');

mix.vue({ version: 2 })
    .js('assets/app/app.js', 'public/builds/app/js/app.js')
    .sass('assets/app/style/app.scss', 'public/builds/app/css/app.css')
    .webpackConfig({
        output: {
            chunkFilename: 'builds/chunks/[name].js',
        },
    })
    .options({
        processCssUrls: false,
        imgLoaderOptions: {
            enabled: false,
        },
    });
