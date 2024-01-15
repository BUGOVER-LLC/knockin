/** @format */
require('dotenv').config();
const path = require('path');
const mix = require('laravel-mix');
const environment = process.env.APP_ENV;
const WebpackObfuscation = require('webpack-obfuscator');
const BundleAnalyzerPlugin = require('webpack-bundle-analyzer').BundleAnalyzerPlugin;
const CompressionPlugin = require('compression-webpack-plugin');
const fs = require('fs');

const bObfuscate = !('false' === process.env.WEBPACK_OBFUSCATE);
const bMinify = bObfuscate || 'true' === process.env.WEBPACK_MINIFY;
const bCompress = bObfuscate || 'true' === process.env.WEBPACK_COMPRESS;
const bAnalyze = 'true' === process.env.WEBPACK_ANALYZE;
const bCleanup = bObfuscate || 'true' === process.env.WEBPACK_CLEANUP;

const buildFolder = 'builds';
const buildFolderFull = path.resolve(__dirname, 'public', buildFolder);

const readdirSync = (dir, list = []) => {
    if (fs.statSync(dir).isDirectory()) {
        fs.readdirSync(dir).map(f => readdirSync(list[list.push(path.join(dir, f)) - 1], list));
    }
    return list;
};
const cleanMaps = folder => {
    console.log('Clean maps:', folder);
    const dirCont = readdirSync(folder);
    const files = dirCont.filter(elm => elm.match(/.*\.js\.map$/gi));
    files.forEach(file => fs.rmSync(file));
};

let modules = [''];
if (typeof process.env.WEBPACK_MODULES !== 'undefined' && process.env.WEBPACK_MODULES !== '') {
    modules = process.env.WEBPACK_MODULES.toString()
        .split(',')
        .map(s => s.trim());
}
modules.sort();
console.log(modules);
console.log('=====================================================');
console.log('    Environment: ', environment);
console.log('    Builds folder: ', buildFolderFull);
console.log('    Modules: ', modules.join(', '));
console.log('    Clean builds: ', bCleanup ? 'Yes' : 'No');
console.log('    Minify: ', bMinify ? 'Yes' : 'No');
console.log('    Compress: ', bCompress ? 'Yes' : 'No');
console.log('    Obfuscate: ', bObfuscate ? 'Yes' : 'No');
console.log('    Analyze packages: ', bAnalyze ? 'Yes' : 'No');
console.log('=====================================================');

modules.forEach(moduleName => {
    require(`./resources/assets/${moduleName}/webpack`)(mix, buildFolder);
});

let mixOptions = {
    processCssUrls: false,
    purifyCss: false,
    extractStyles: false,
    imgLoaderOptions: {
        enabled: false,
    },
    terser: {
        extractComments: false,
    },
    runtimeChunkPath: `${buildFolder}/vendor`,
};
let webpackConfig = {
    resolve: {
        extensions: ['.js', '.vue', '.ts'],
        alias: {
            '@': path.resolve(__dirname, './resources/assets'),
        },
    },
    output: {
        chunkFilename: `${buildFolder}/chunks/[name].[hash].js`,
    },
    optimization: {
        splitChunks: {
            chunks: 'all',
        },
    },
};

if (bMinify) {
    mixOptions.uglify = {
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
    };
    webpackConfig.devtool = 'source-map';
}
//obfuscate
if (bObfuscate) {
    webpackConfig.plugins.push(
        new WebpackObfuscation({
            sourceMap: true,
            sourceMapFileName: '[file].map',
            rotateStringArray: true,
            rotateUnicodeArray: true,
        }),
    );
    webpackConfig.devtool = 'hidden-source-map';
}
if (bCompress) {
    webpackConfig.plugins.push(
        new CompressionPlugin({
            algorithm: 'gzip',
            test: /\.js$|\.ts$|\.css$|\.html$|\.jp2$|\.jpg$|\.jpeg$|\.svg$|\.png$|\.webp$|\.mp3$|\.ico$/,
            threshold: 10240,
            minRatio: 1,
            compressionOptions: {
                level: 9,
            },
        }),
    );
}
if (bAnalyze) {
    webpackConfig.plugins.push(new BundleAnalyzerPlugin());
}
if (bCleanup) {
    mix.webpackConfig({
        output: {
            clean: {
                keep: function (asset) {
                    // remove all files from builds directory. leave hidden files
                    let m = new RegExp(`^\\/?${buildFolder}\\/(?!($|\\.))`);
                    return asset.match(m) === null;
                },
            },
        },
    });
}

mix.webpackConfig(webpackConfig)
    .vue({ version: 2 })
    .options(mixOptions)
    .extract({
        to: `${buildFolder}/vendor/vendor.js`,
        libraries: ['vue', 'vuex', 'vue-router', 'vee-validate', 'vuetify', 'moment'],
    })
    .after(stats => {
        if (bObfuscate) {
            cleanMaps(buildFolderFull);
        }
    })
    .disableSuccessNotifications()
    .disableNotifications()
    .version();
