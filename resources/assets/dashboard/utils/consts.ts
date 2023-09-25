/** @format */

const cRefObject: HTMLElement | null = document.head.querySelector('meta[name="csrf-token"]');
if (null === cRefObject) {
    process.exit(500);
    throw new Error('Go');
}
const cRef: string | null = cRefObject.getAttribute('content');

const BROADCAST = {
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    wsPort: process.env.MIX_PUSHER_PORT,
    wssPort: process.env.MIX_PUSHER_PORT,
    forceTLS: process.env.MIX_PUSHER_TLS,
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
    wsHost: window.location.hostname,
    httpHost: window.location.hostname,
    stats_host: window.location.hostname,
};

export { BROADCAST, cRef };
