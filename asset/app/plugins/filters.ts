/** @format */

import Vue from 'vue';

export default Vue.filter('storageUrl', function (value, path) {
    const image = `${path}/${value}`;
    return Storage.url(image);
});
