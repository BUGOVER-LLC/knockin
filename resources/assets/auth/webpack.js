/** @format */

const mix = require('laravel-mix');

module.exports = function (mix, buildFolder) {
    mix
        .ts('resources/assets/auth/app.ts', `${buildFolder}/auth/js/app.js`)
        .sass('resources/assets/auth/style/app.scss', `${buildFolder}/auth/css/app.css`);
}
