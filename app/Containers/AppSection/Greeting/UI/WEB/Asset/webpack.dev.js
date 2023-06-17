/** @format */

const mix = require('laravel-mix');

mix.vue({ version: 2 })
    .ts('assets/Asset/Asset.ts', 'public/builds/Asset/js/Asset.js')
    .sass('assets/Asset/style/Asset.scss', 'public/builds/Asset/css/Asset.css')
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
