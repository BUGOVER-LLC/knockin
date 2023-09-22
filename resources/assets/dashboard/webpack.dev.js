/** @format */

const mix = require('laravel-mix');

mix.vue({version: 2})
    .ts('asset/dashboard/app.ts', 'public/builds/dashboard/js/app.js')
    .sass('asset/dashboard/style/app.scss', 'public/builds/dashboard/css/app.css')
    .webpackConfig({
        output: {
            chunkFilename: 'builds/chunks/[name].js',
        },
    })
    .options({
        processCssUrls: true,
        imgLoaderOptions: {
            enabled: false,
        },
    });
