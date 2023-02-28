/** @format */

export const cRef = document.head.querySelector('meta[name="csrf-token"]');

if (cRef) {
    cRef.getAttribute('content');
}

const process = process;

export const BROADCAST = {
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    wsPort: process.env.MIX_PUSHER_PORT,
    wssPort: process.env.MIX_PUSHER_PORT,
    forceTLS: process.env.MIX_PUSHER_TLS,
    wsHost: window.location.hostname,
    encrypted: process.env.MIX_PUSHER_ENCRYPTED,
    enableStats: process.env.MIX_PUSHER_STATISTIC,
    disableStats: !process.env.MIX_PUSHER_STATISTIC,
    enabledTransports: ['ws', 'wss'],
    disabledTransports: ['sockjs', 'xhr_polling', 'xhr_streaming'],
    namespace: '',
    csrfToken: cRef,
    authEndpoint: '/broadcasting/auth',
    transports: ['websocket', 'polling'],
    autoConnect: true,
    rejectUnauthorized: '-',
    perMessageDeflate: '-',
    httpHost: window.location.hostname,
    stats_host: window.location.hostname,
};
