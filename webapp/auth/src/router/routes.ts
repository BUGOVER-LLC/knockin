import { RouteConfig } from 'vue-router';

const authStarted = (): object => import('@/pages/Auth.vue');

const Routes: RouteConfig[] = [
    // Authentication
    {
        props: true,
        name: 'authIndex',
        path: '/producer/auth',
        component: authStarted,
    },
];

export default Routes;
