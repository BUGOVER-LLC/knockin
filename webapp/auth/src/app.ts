import '@/plugins/validate';
import '@/common/bootstrap';
import 'vue-class-component/hooks';

import Vue from 'vue';

import App from '@/layout/App.vue';
import i18n from '@/plugins/i18n';
import vuetify from '@/plugins/vuetify';
import router from '@/router';
import store from '@/store';

if ('local' !== process.env.MIX_APP_ENV) {
    Vue.config.devtools = false;
    Vue.config.silent = true;
}
Vue.component('AppLayout', App);
const el: string = '#noix-greeting-src';
new Vue({
    el,
    i18n,
    store,
    router,
    vuetify,
}).$mount(el);
