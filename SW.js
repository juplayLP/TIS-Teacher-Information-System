function registerServiceWorker() {
    // register sw script in supporting browsers
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('sw.js', { scope: '/' }).then(() => {
            console.log('Service Worker registered successfully.');
        }).catch(error => {
            console.log('Service Worker registration failed:', error);
        });
    }
}
self.addEventListener('install', (event) => {
    console.log('👷', 'install', event);
    self.skipWaiting();
});

self.addEventListener('activate', (event) => {
    console.log('👷', 'activate', event);
    return self.clients.claim();
});

self.addEventListener('fetch', function(event) {
     console.log('👷', 'fetch', event);
    event.respondWith(fetch(event.request));
});