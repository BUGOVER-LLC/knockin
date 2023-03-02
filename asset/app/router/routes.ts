/** @format */

import { RouteConfig } from 'vue-router';

const AuthIndex = (): any => import('@/app/pages/auth/AuthIndex.vue');
const Greeting = (): any => import('@/app/pages/greeting/GreetingIndex.vue');
const Application = (): any => import('@/app/pages/greeting/GreetingIndex.vue');

export const Routes: RouteConfig[] = [
    {
        props: true,
        name: 'greeting',
        path: '/',
        component: Greeting,
    },
    {
        props: true,
        name: 'authIndex',
        path: '/signin',
        component: AuthIndex,
    },
    {
        props: true,
        name: 'applicationIndex',
        path: '/noix/:id',
        component: Application,
    },
];
