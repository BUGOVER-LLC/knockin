/** @format */

import { RouteConfig } from 'vue-router';

import { acceptCodePageCheck, auth } from '@/app/router/middlewares';
const emailSender = (): object => import('@/app/pages/auth/started/EmailSender.vue');
const confirmCode = (): object => import('@/app/pages/auth/started/ConfirmCode.vue');
const authIndex = (): object => import('@/app/pages/auth/AuthIndex.vue');
const greeting = (): object => import('@/app/pages/greeting/GreetingIndex.vue');
const application = (): object => import('@/app/pages/AppIndex.vue');

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
        path: '/auth',
        component: authIndex,
        children: [
            {
                props: false,
                name: 'emailSender',
                path: '/started',
                component: emailSender,
            },
            {
                props: false,
                name: 'authConfirm',
                path: '/confirm',
                component: confirmCode,
                meta: {
                    middleware: acceptCodePageCheck,
                },
            },
        ],
    },
    {
        props: true,
        name: 'applicationIndex',
        path: '/noix/:id',
        component: application,
        meta: {
            middleware: auth,
        },
    },
];
