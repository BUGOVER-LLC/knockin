/** @format */

import Vue from 'vue';
import Router from 'vue-router';
import { routes } from './routes';

Vue.use(Router);

export const router = new Router({
    linkActiveClass: 'active',
    linkExactActiveClass: 'active',
    mode: 'history',
    base: process.env.APP_URL,
    routes,
});
