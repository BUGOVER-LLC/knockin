/** @format */

import { RouteConfig } from 'vue-router';

const authStarted = (): object => import('@/pages/Auth.vue');
const passwordConfirm = (): object => import('@/pages/PasswordConfirm.vue');

const Routes: RouteConfig[] = [
    // Authentication
    {
        props: true,
        name: 'authIndex',
        path: '/producer/auth',
        component: authStarted,
    },
    {
        props: true,
        name: 'authPassword',
        path: '/producer/auth/password',
        component: passwordConfirm,
    },
];

export default Routes;
