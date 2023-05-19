/** @format */

import './utils/bootstrap';

import VueHotkey from 'v-hotkey';
import VueMask from 'v-mask';
import Vue from 'vue';

import App from './pages/App.vue';
import { vuetify } from './plugins';
import { router } from './router';
import store from './store';

Vue.use(VueMask);
Vue.use(VueHotkey);
Vue.component('AppDashboard', App);

const app = new Vue({
    store,
    router,
    vuetify,
});
app.$mount('#app-knock');
