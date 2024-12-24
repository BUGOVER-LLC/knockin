/** @format */

export interface IRouteNames {}

const routesNames: Readonly<IRouteNames> = {};

declare module 'vue/types/vue' {
    // noinspection JSUnusedGlobalSymbols
    interface Vue {
        $routesNames: IRouteNames;
    }
}

export default routesNames;
