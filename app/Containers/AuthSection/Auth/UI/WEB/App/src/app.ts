/** @format */

import '@/plugins/validate/index';
import '@/common/bootstrap';

import Vue from 'vue';

import App from '@/layout/App.vue';
import i18n from '@/plugins/i18n/index';
import vuetify from '@/plugins/vuetify';
import router from '@/router';
import store from '@/store';

if ('local' !== process.env.MIX_APP_ENV) {
    Vue.config.devtools = false;
    Vue.config.silent = true;
}
Vue.component('AppLayout', App);
const el: string = '#court-producing';
const app = new Vue({
    el,
    i18n,
    store,
    router,
    vuetify,
});
app.$mount(el);
