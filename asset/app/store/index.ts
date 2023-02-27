/** @format */

import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
    devtools: 'production' !== process.env.NODE_ENV,
    strict: true,
    modules: {},
});
