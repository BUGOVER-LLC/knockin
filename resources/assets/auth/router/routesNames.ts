/**
 * eslint-disable
 *
 * @format
 */

/** @format */
// noinspection ES6UnusedImports
import Vue from 'vue';

export type IRouteNames = {
    authIndex: string;
    selectWorkspace: string;
    emailSender: string;
    authConfirm: string;
};

const routesNames: Readonly<IRouteNames> = {
    authIndex: 'authIndex',
    selectWorkspace: 'authIndex',
    emailSender: 'emailSender',
    authConfirm: 'authConfirm',
};

declare module 'vue/types/vue' {
    interface Vue {
        $routeNames: IRouteNames;
    }
}

export default routesNames;
