/** @format */

import './utils/bootstrap';

import Vue from 'vue';

import { vuetify } from './plugins';
import { router } from './router';
import store from './store';
import VueHotkey from 'v-hotkey';

Vue.use(VueHotkey);

const app = new Vue({
    store,
    router,
    vuetify,
});
app.$mount('#app-knock');
