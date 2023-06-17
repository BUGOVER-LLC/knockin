/** @format */

import { RouteConfig } from 'vue-router';

const greeting = (): object => import('@/app/pages/dashboard/Greeting.vue');
const dashboard = (): object => import('@/app/pages/dashboard/Board.vue');

export const Routes: RouteConfig[] = [
    {
        props: true,
        name: 'applicationGreeting',
        path: '/Asset/greeting/:target_id',
        component: greeting,
    },
    {
        props: true,
        name: 'applicationIndex',
        path: '/Asset/client/:target_id/:second_target_id?/:thread_target_id?',
        component: dashboard,
    },
];
