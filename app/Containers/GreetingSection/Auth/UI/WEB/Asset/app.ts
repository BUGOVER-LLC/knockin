/** @format */

import VueHotkey from 'v-hotkey';
import VueMask from 'v-mask';
import Vue from 'vue';

import { vuetify } from '../../../../../AppSection/Greeting/UI/WEB/Asset/plugins';
import { router } from '../../../../../AppSection/Greeting/UI/WEB/Asset/router';

import App from './pages/App.vue';

Vue.use(VueMask);
Vue.use(VueHotkey);
Vue.component('AuthPage', App);

const app = new Vue({
    router,
    vuetify,
});
app.$mount('#app-auth');
