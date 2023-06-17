/** @format */

const mix = require('laravel-mix');

mix.vue({ version: 2 })
    .ts('assets/auth/app.ts', 'public/builds/auth/js/app.js')
    .sass('assets/auth/style/app.scss', 'public/builds/auth/css/app.css')
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