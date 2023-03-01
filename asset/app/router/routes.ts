/** @format */

import { RouteConfig } from 'vue-router';

const AuthIndex = (): any => import('~/app/pages/auth/AuthIndex.vue');
export const Routes: RouteConfig[] = [
    {
        props: true,
        name: 'authIndex',
        path: '/',
        components: {
            // toolbar: Toolbar,
            // navigation: Navigation,
            default: AuthIndex,
        },
    },
];
