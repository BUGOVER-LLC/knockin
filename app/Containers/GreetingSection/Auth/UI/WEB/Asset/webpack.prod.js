/** @format */

const mix = require('laravel-mix');
const CompressionPlugin = require('compression-webpack-plugin');

mix.vue({ version: 2 })
    .ts('assets/auth/app.ts', 'public/builds/auth/js/app.ts')
    .sass('assets/auth/style/app.scss', 'public/builds/auth/css/app.css')
    .webpackConfig({
        output: {
            chunkFilename: 'builds/chunks/[name].[hash].js',
        },
        plugins: [
            new CompressionPlugin({
                algorithm: 'gzip',
                test: /\.js$|\.ts$|\.css$|\.html$|\.jp2$|\.jpg$|\.jpeg$|\.svg$|\.png$|\.webp$|\.mp3$|\.ico$/,
                threshold: 10240,
                minRatio: 1,
                compressionOptions: {
                    level: 9,
                },
            }),
        ],
    })
    .options({
        processCssUrls: true,
        purifyCss: true,
        extractStyles: false,
        imgLoaderOptions: {
            enabled: false,
        },
        uglify: {
            uglifyOptions: {
                compress: {
                    drop_debugger: true,
                    sequences: true,
                    booleans: true,
                    loops: true,
                    unused: true,
                    warnings: false,
                    errors: false,
                    drop_console: true,
                    unsafe: false,
                    comments: false,
                },
            },
        },
    })
    .disableSuccessNotifications()
    .disableNotifications()
    .version();
