/** @format */

import { RouteConfig } from 'vue-router';

import { acceptCodePageCheck } from '@/app/router/middlewares';
const emailSender = (): object => import('@/auth/components/started/EmailSender.vue');
const confirmCode = (): object => import('@/auth/components/started/ConfirmCode.vue');
const authIndex = (): object => import('@/auth/pages/AuthIndex.vue');

export const Routes: RouteConfig[] = [
    {
        props: true,
        name: 'authIndex',
        path: '/auth',
        component: authIndex,
        children: [
            {
                props: false,
                name: 'emailSender',
                path: 'started',
                component: emailSender,
            },
            {
                props: false,
                name: 'authConfirm',
                path: 'confirm',
                component: confirmCode,
                meta: {
                    middleware: acceptCodePageCheck,
                },
            },
        ],
    },
];
