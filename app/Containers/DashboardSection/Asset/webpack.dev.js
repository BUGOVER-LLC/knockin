/** @format */

const mix = require('laravel-mix');

mix.vue({ version: 2 })
    .ts('app/Containers/DashboardSection/Asset/app.ts', 'public/builds/greeting/js/app.js')
    .sass('app/Containers/DashboardSection/Asset/style/app.scss', 'public/builds/greeting/css/app.css')
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
