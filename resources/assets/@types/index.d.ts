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
