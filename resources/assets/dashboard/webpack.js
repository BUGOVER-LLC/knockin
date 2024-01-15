/** @format */

const mix = require('laravel-mix');

module.exports = function (mix, buildFolder) {
    mix
        .ts('resources/assets/dashboard/app.ts', `${buildFolder}/dashboard/js/app.js`)
        .sass('resources/assets/dashboard/style/app.scss', `${buildFolder}/dashboard/css/app.css`);
}
