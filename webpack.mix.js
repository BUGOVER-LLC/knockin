/** @format */

require('dotenv').config();
const path = require('path');
const mix = require('laravel-mix');
const environment = process.env.APP_ENV;
const strictMode = 'true' === process.env.STRICT_MODE ?? false;
const WebpackObfuscation = require('webpack-obfuscator');
const BundleAnalyzerPlugin = require('webpack-bundle-analyzer').BundleAnalyzerPlugin;

if ('local' !== environment) {
    /**
     * =================================================================================================================
     * 💣    For complex build all bundles, Production or Development environments
     * =================================================================================================================
     */
    require('./assets/auth/webpack.prod');
    require('./assets/app/webpack.prod');

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
    require('./assets/auth/webpack.dev');
    require('./assets/app/webpack.dev');

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
                '@': path.resolve(__dirname, './assets'),
            },
        },
        optimization: {
            splitChunks: {
                chunks: 'all',
            },
        },
        plugins: [new BundleAnalyzerPlugin()],
        devtool: 'source-map',
    }),
);

mix.extract({
    to: 'builds/vendor/vendor.js',
    libraries: ['vue', 'vuex', 'vue-router', 'vuetify', 'vee-validate', 'vuex-persist'],
});

mix.options({
    terser: {
        extractComments: false,
    },
    runtimeChunkPath: 'builds/vendor',
});
