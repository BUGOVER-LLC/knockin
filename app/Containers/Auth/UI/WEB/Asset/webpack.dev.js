/** @format */

const mix = require('laravel-mix');

mix.vue({ version: 2 })
    .ts('assets/auth/Asset.ts', 'public/builds/auth/js/Asset.js')
    .sass('assets/auth/style/Asset.scss', 'public/builds/auth/css/Asset.css')
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
