/** @format */

import { RouteConfig } from 'vue-router';

const greeting = (): object => import('@/dashboard/pages/dashboard/Greeting.vue');
const dashboard = (): object => import('@/dashboard/pages/dashboard/Board.vue');

export const Routes: RouteConfig[] = [
    {
        props: true,
        name: 'applicationGreeting',
        path: '/',
        component: greeting,
    },
    {
        props: true,
        name: 'applicationIndex',
        path: '/app/client/:target_id/:second_target_id?/:thread_target_id?',
        component: dashboard,
    },
];
