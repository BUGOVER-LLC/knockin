/** @format */

import { RouteConfig } from 'vue-router';

const emailSender = (): object => import('@/auth/components/started/EmailSenderComponent.vue');
const confirmCode = (): object => import('@/auth/components/started/ConfirmCodeComponent.vue');
const authIndex = (): object => import('@/auth/pages/Email.vue');
const choiseWorkspace = (): object => import('@/auth/components/started/WorkspacesListComponent.vue');
const createWorkspace = (): object => import('@/auth/pages/CreateWorkspace.vue');

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
            },
            {
                props: true,
                path: 'workspace',
                name: 'selectWorkspace',
                component: choiseWorkspace,
            },
        ],
    },
    {
        props: true,
        name: 'createWorkspace',
        path: 'workspace/create',
        component: createWorkspace,
    },
];
