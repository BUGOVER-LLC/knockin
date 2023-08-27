/** @format */

import {RouteConfig} from 'vue-router';

import {acceptCodePageCheck} from '@/router/middlewares';

const emailSender = (): object => import('@/components/started/EmailSender.vue');
const confirmCode = (): object => import('@/components/started/ConfirmCode.vue');
const authIndex = (): object => import('@/pages/AuthIndex.vue');

export const Routes: RouteConfig[] = [
    {
        props: true,
        name: 'authIndex',
        path: '/auth',
        component: authIndex,
        children: [
            {
                props: false,
                path: 'started',
                name: 'emailSender',
                component: emailSender,
            },
            {
                props: false,
                path: 'confirm',
                name: 'authConfirm',
                component: confirmCode,
                meta: {
                    middleware: acceptCodePageCheck,
                },
            },
        ],
    },
];
