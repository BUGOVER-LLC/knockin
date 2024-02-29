/** @format */

import { RouteConfig } from 'vue-router';

import { acceptCodePageCheck } from '@/auth/router/middlewares';

const emailSender = (): object => import('@/auth/components/started/EmailSender.vue');
const confirmCode = (): object => import('@/auth/components/started/ConfirmCode.vue');
const authIndex = (): object => import('@/auth/pages/AuthIndex.vue');
const selectWorkspace = (): object => import('@/auth/pages/AuthWorkspace.vue');

export const Routes: RouteConfig[] = [
    {
        props: true,
        name: 'authIndex',
        path: '/auth/started',
        component: authIndex,
        children: [
            {
                props: false,
                path: 'email',
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
    {
        props: true,
        path: '/auth/workspace',
        name: 'selectWorkspace',
        component: selectWorkspace,
    },
];
