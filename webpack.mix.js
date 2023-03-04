/** @format */

require('dotenv').config();
const path = require('path');
const mix = require('laravel-mix');
const environment = process.env.APP_ENV;
const strictMode = 'true' === process.env.STRICT_MODE ?? false;
const WebpackObfuscation = require('webpack-obfuscator');

if ('local' !== environment) {
    /**
     * =================================================================================================================
     * 💣    For complex build all bundles, Production or Development environments
     * =================================================================================================================
     */
    require('./asset/app/webpack.prod');

    mix.webpackConfig({
        plugins: [
            new WebpackObfuscation({
                rotateStringArray: true,
                rotateUnicodeArray: true,
            }),
        ],
    });
} else {
    /**
     * =================================================================================================================
     * 🤠    Uncomment the one, on which you work and run your ran watch, dev or prod, for local development environment
     * =================================================================================================================
     */
    require('./asset/app/webpack.dev');

    if (strictMode) {
        mix.sourceMaps();
    }
}

// Global webpack config for all bundles
mix.webpackConfig(
    (module.exports = {
        resolve: {
            extensions: ['.js', '.ts', '.vue'],
            alias: {
                '@': path.resolve(__dirname, './asset'),
            },
        },
        optimization: {
            splitChunks: {
                chunks: 'all',
            },
        },
    }),
);

mix.extract({
    to: 'builds/vendor/vendor.js',
    libraries: ['vue', 'vuex', 'vue-router', 'vuetify', 'vee-validate'],
});

mix.options({
    terser: {
        extractComments: false,
        runtimeChunkPath: 'builds/vendor',
    },
});
