/** @format */

import RouteConfig from 'vue-router';

export const Routes: RouteConfig[] = [
    {
        name: 'authIndex',
        path: '/',
        component: () => import('~/app/pages/auth/Index'),
    },
];
