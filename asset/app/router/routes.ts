/** @format */

export const Routes = [
    {
        props: true,
        name: 'authIndex',
        path: '/',
        components: {
            // toolbar: Toolbar,
            // navigation: Navigation,
            default: () => import('~/app/pages/auth/AuthIndex'),
        },
        children: [
            {

            }
        ],
    },
];
