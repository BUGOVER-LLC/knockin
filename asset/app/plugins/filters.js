/** @format */

import Vue from 'vue';

Vue.filter('storageUrl', function (value, path) {
    const image = `${path}/${value}`;
    return Storage.url(image);
});
