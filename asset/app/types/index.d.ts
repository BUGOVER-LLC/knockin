/** @format */

export {};

import Echo from 'laravel-echo';

declare global {
    // noinspection JSUnusedGlobalSymbols
    interface Window {
        Pusher: any;
        Echo: Echo;
    }
}

declare module '*.vue' {
    import Vue from 'vue';
    export default Vue;
}
