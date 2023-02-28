/** @format */

import Vue from 'vue';
import { vuetify } from './plugins';
import { router } from './router';
import store from './store';
import './utils/bootstrap';

new Vue({
    store,
    router,
    vuetify,
}).$mount('#app-knock');
