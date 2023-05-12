/** @format */

import VueHotkey from 'v-hotkey';
import VueMask from 'v-mask';
import Vue from 'vue';

import { vuetify } from '@/auth/plugins';
import { router } from '@/auth/router';

Vue.use(VueMask);
Vue.use(VueHotkey);

const app = new Vue({
    router,
    vuetify,
});
app.$mount('#auth-knock');
