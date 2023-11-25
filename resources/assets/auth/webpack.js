/** @format */

module.exports = function (mix, buildFolder) {
    mix.vue({ version: 2 })
        .ts('resources/assets/auth/app.ts', `${buildFolder}/auth/js/app.js`)
        .sass('resources/assets/auth/app.scss', `${buildFolder}/auth/css/app.css`);
};
