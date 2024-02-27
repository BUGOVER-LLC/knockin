/** @format */

const mix = require('laravel-mix');

module.exports = function (mix, buildFolder) {
    mix
        .ts('resources/assets/app/app.ts', `${buildFolder}/app/js/app.js`)
        .sass('resources/assets/app/style/app.scss', `${buildFolder}/app/css/app.css`);
}
