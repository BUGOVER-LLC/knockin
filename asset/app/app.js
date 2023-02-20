/** @format */

import Vue from 'vue';
import { vuetify } from 'plugins';
import { router } from 'router';
import store from 'store';
import './utils/bootstrap';

new Vue({
    router,
    store,
    vuetify,
}).$mount('#app-knock');
