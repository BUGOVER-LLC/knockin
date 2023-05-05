/** @format */

import { RouteConfig } from 'vue-router';

const app = (): object => import('@/app/pages/App.vue');
const greeting = (): object => import('@/app/pages/dashboard/Greeting.vue');
const dashboard = (): object => import('@/app/pages/dashboard/Board.vue');

export const Routes: RouteConfig[] = [
    {
        props: true,
        name: 'applicationGreeting',
        path: '/app/greeting/:target_id',
        component: greeting,
    },
    {
        props: true,
        name: 'applicationIndex',
        path: '/app/client/:target_id/:second_target_id?/:thread_target_id?',
        component: dashboard,
    },
    // {
    //     props: true,
    //     name: 'application',
    //     path: '/app',
    //     component: app,
    //     // meta: {
    //     //     middleware: auth,
    //     // },
    //     children: [
    //         // {
    //         //     props: true,
    //         //     name: 'applicationGreeting',
    //         //     path: 'greeting/:target_id',
    //         //     component: greeting,
    //         // },
    //         {
    //             props: true,
    //             name: 'applicationIndex',
    //             path: 'client/:target_id/:second_target_id?/:thread_target_id?',
    //             component: dashboard,
    //         },
    //     ],
    // },
];
