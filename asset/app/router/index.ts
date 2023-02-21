/** @format */

import Vue from 'vue';
import { Routes } from './routes';
import VueRouter, { Location, Route } from 'vue-router';

Vue.use(VueRouter);

export const router = new VueRouter({
    linkActiveClass: 'active',
    linkExactActiveClass: 'active',
    mode: 'history',
    base: process.env.APP_URL,
    routes: Routes,
});
