/** @format */

import { RouteConfig } from 'vue-router';

const getStartedIndex = (): any => import('@/app/pages/auth/started/GetStartedIndex.vue');
const authIndex = (): any => import('@/app/pages/auth/AuthIndex.vue');
const greeting = (): any => import('@/app/pages/greeting/GreetingIndex.vue');
const application = (): any => import('@/app/pages/application/AppIndex.vue');

export const Routes: RouteConfig[] = [
    {
        props: true,
        name: 'greetingIndex',
        path: '/',
        component: greeting,
    },
    {
        props: true,
        name: 'authIndex',
        path: '/signin',
        component: authIndex,
        children: [
            {
                props: false,
                name: 'authStartedIndex',
                path: '/started',
                component: getStartedIndex,
            },
        ],
    },
    {
        props: true,
        name: 'applicationIndex',
        path: '/noix/:id',
        component: application,
    },
];
