self.addEventListener('install', event => {
    console.log('Service worker installed');
    self.skipWaiting();
});

self.addEventListener('fetch', event => {
    // Default: network-first
    event.respondWith(fetch(event.request));
});