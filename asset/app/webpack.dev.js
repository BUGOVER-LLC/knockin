/** @format */

const mix = require('laravel-mix');

mix.vue({ version: 2 })
    .js('asset/app/app.ts', 'public/builds/app/js/app.ts')
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
