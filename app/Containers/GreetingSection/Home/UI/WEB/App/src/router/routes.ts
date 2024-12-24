/** @format */

import { RouteConfig } from 'vue-router';

const authStarted = (): object => import('@/pages/auth/Auth.vue');
const boardIndex = (): object => import('@/pages/board/Index.vue');
const roleIndex = (): object => import('@/pages/board/role/RoleIndex.vue');
const permissionIndex = (): object => import('@/pages/board/permission/Index.vue');
const usersControl = (): object => import('@/pages/board/user/Index.vue');
const createRole = (): object => import('@/pages/board/role/CreateRole.vue');
const systemControl = (): object => import('@/pages/board/system/Index.vue');
const editRole = (): object => import('@/pages/board/role/EditRole.vue');
const selectSystem = (): object => import('@/pages/auth/SelectSystem.vue');
const passwordConfirm = (): object => import('@/pages/auth/PasswordConfirm.vue');
const attributes = (): object => import('@/pages/board/attributes/Index.vue');

const Routes: RouteConfig[] = [
    // Authentication
    {
        props: true,
        name: 'authIndex',
        path: '/',
        component: authStarted,
    },
    {
        props: true,
        name: 'authPassword',
        path: '/producer/auth/password',
        component: passwordConfirm,
    },
    // Set environment
    {
        props: true,
        name: 'setEnvironment',
        path: '/producer/started/environment',
        component: selectSystem,
    },

    {
        props: true,
        path: '/producer/board',
        name: 'produceBoard',
        component: boardIndex,
        children: [
            // Roles
            {
                props: true,
                name: 'boardRole',
                path: 'roles',
                component: roleIndex,
            },
            {
                props: true,
                name: 'createRole',
                path: 'roles/create',
                component: createRole,
            },
            {
                props: true,
                name: 'editRole',
                path: 'roles/edit/:roleId',
                component: editRole,
            },
            // Permissions
            {
                props: true,
                name: 'boardPermission',
                path: 'permissions',
                component: permissionIndex,
            },
            // Users
            {
                props: true,
                name: 'usersControl',
                path: 'users',
                component: usersControl,
            },
            // SystemModel
            {
                props: true,
                name: 'appControl',
                path: 'app',
                component: systemControl,
            },
            // resourceAttributes
            {
                props: true,
                name: 'resourceAttributes',
                path: 'attributes',
                component: attributes,
            },
        ],
    },
];

export default Routes;
