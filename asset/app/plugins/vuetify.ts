/** @format */

import Vue from 'vue';
import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css';

Vue.use(Vuetify);

// noinspection JSUnusedGlobalSymbols
export default new Vuetify({
    iconfont: 'mdiSvg',
    treeShake: true,
    theme: {
        dark: false,
    },
});
