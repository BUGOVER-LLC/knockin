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
    require('./app/Containers/DashboardSection/Asset/webpack.prod');
    require('./app/Containers/GreetingSection/Auth/UI/WEB/Asset/webpack.prod');

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
    require('./app/Containers/DashboardSection/Asset/webpack.dev');
    require('./app/Containers/GreetingSection/Auth/UI/WEB/Asset/webpack.dev');

    if (strictMode) {
        mix.sourceMaps().webpackConfig(
            (module.exports = {
                plugins: [new BundleAnalyzerPlugin()],
                devtool: 'source-map',
            }),
        );
    }
}

// Global webpack config for all bundles
mix.webpackConfig(
    (module.exports = {
        resolve: {
            extensions: ['.js', '.ts', '.vue'],
            alias: {
                '@': path.resolve(__dirname, './app/Containers/GreetingSection/Auth/UI/WEB/Asset'),
                '@': path.resolve(__dirname, './app/Containers/DashboardSection/Asset'),
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
    libraries: ['vue', 'vuex', 'vue-router', 'vuetify', 'vee-validate', 'vuex-persist'],
});

mix.options({
    terser: {
        extractComments: false,
    },
    runtimeChunkPath: 'builds/vendor',
});
