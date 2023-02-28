/** @format */

const mix = require('laravel-mix');

mix.vue({ version: 2 })
    .ts('asset/app/app.ts', 'public/builds/app/js/app.js')
    .sass('asset/app/style/app.scss', 'public/builds/app/css/app.css')
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
