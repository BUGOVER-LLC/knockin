/** @format */

const getStartedIndex = () => import('@/app/pages/auth/started/GetStartedIndex.vue');
const authIndex = () => import('@/app/pages/auth/AuthIndex.vue');
const greeting = () => import('@/app/pages/greeting/GreetingIndex.vue');
const application = () => import('@/app/pages/application/AppIndex.vue');

export const Routes = [
    {
        props: true,
        name: 'greetingIndex',
        path: '/',
        component: greeting,
    },
    {
        props: true,
        name: 'authIndex',
        path: '/signin',
        component: authIndex,
        children: [
            {
                props: false,
                name: 'authStartedIndex',
                path: '/started',
                component: getStartedIndex,
            },
        ],
    },
    {
        props: true,
        name: 'applicationIndex',
        path: '/noix/:id',
        component: application,
    },
];
