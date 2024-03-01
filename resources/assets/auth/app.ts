/** @format */

import VueHotkey from 'v-hotkey';
import VueMask from 'v-mask';
import Vue from 'vue';

import { vuetify } from '@/auth/plugins';
import { router } from '@/auth/router';

import App from './layout/App.vue';
import store from './store';

Vue.use(VueMask);
Vue.use(VueHotkey);
Vue.component('AuthPage', App);

const app = new Vue({
    store,
    router,
    vuetify,
});
app.$mount('#app-auth');
