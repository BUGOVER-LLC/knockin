/** @format */

export const routes = [
    {
        props: true,
        name: 'authIndex',
        path: '/',
        components: {
            // toolbar: Toolbar,
            // navigation: Navigation,
            default: () => import('~/app/pages/auth/Index'),
        },
    },
];
