export interface IRouteNames {
    authIndex: string;
}

const routesNames: Readonly<IRouteNames> = {
    authIndex: 'authIndex',
};

declare module 'vue/types/vue' {
    // noinspection JSUnusedGlobalSymbols
    interface Vue {
        $routesNames: IRouteNames;
    }
}

export default routesNames;
