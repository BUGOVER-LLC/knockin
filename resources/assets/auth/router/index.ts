/** @format */

import Vue from 'vue';
import VueRouter from 'vue-router';

import { Routes } from './routes';

Vue.use(VueRouter);

export const router = new VueRouter({
    linkActiveClass: 'active',
    linkExactActiveClass: 'active',
    mode: 'history',
    base: process.env.APP_URL,
    routes: Routes,
});
