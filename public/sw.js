/*
 Copyright 2016 Google Inc. All Rights Reserved.
 Licensed under the Apache License, Version 2.0 (the "License");
 you may not use this file except in compliance with the License.
 You may obtain a copy of the License at
 http://www.apache.org/licenses/LICENSE-2.0
 Unless required by applicable law or agreed to in writing, software
 distributed under the License is distributed on an "AS IS" BASIS,
 WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 See the License for the specific language governing permissions and
 limitations under the License.
 */
// Names of the two caches used in this version of the service worker.
// Change to v2, etc. when you update any of the local resources, which will
// in turn trigger the install event again.
const CACHE_NAME = 'offline';
const OFFLINE_VERSION = '1.0.0';
const OFFLINE_URL = [
    'offline/offline.html',
    'offline/fonts/Marianne-Regular.woff',
    'offline/fonts/Marianne-Regular.woff2'
];
// The install handler takes care of precaching the resources we always need.
self.addEventListener('install', event => {
  event.waitUntil(
      (async () => {
        const cache = await caches.open(CACHE_NAME);
        // Setting {cache: 'reload'} in the new request will ensure that the
        // response isn't fulfilled from the HTTP cache; i.e., it will be from
        // the network.
        await cache.addAll(OFFLINE_URL);
      })()
  );
  // Force the waiting service worker to become the active service worker.
  self.skipWaiting();
});

// The activate handler takes care of cleaning up old caches.
self.addEventListener('activate', event => {
  event.waitUntil(
      (async () => {
        // Enable navigation preload if it's supported.
        // See https://developers.google.com/web/updates/2017/02/navigation-preload
        if ("navigationPreload" in self.registration) {
          await self.registration.navigationPreload.enable();
        }
      })()
  );

  // Tell the active service worker to take control of the page immediately.
  self.clients.claim();
});
// The fetch handler serves responses for same-origin resources from a cache.
// If no response is found, it populates the runtime cache with the response
// from the network before returning it to the page.
self.addEventListener("fetch", (event) => {
    // We only want to call event.respondWith() if this is a navigation request
    // for an HTML page.
    if (event.request.mode === "navigate") {
        event.respondWith(
            (async () => {
                try {
                    // First, try to use the navigation preload response if it's supported.
                    const preloadResponse = await event.preloadResponse;
                    if (preloadResponse) {
                        return preloadResponse;
                    }

                    // Always try the network first.
                    const networkResponse = await fetch(event.request);
                    return networkResponse;
                } catch (error) {
                    // catch is only triggered if an exception is thrown, which is likely
                    // due to a network error.
                    // If fetch() returns a valid HTTP response with a response code in
                    // the 4xx or 5xx range, the catch() will NOT be called.
                    console.log("Fetch failed; returning offline page instead.", error);

                    const cache = await caches.open(CACHE_NAME);
                    const cachedResponse = await cache.match(OFFLINE_URL);
                    return cachedResponse;
                }
            })()
        );
    }

    // If our if() condition is false, then this fetch handler won't intercept the
    // request. If there are any other fetch handlers registered, they will get a
    // chance to call event.respondWith(). If no fetch handlers call
    // event.respondWith(), the request will be handled by the browser as if there
    // were no service worker involvement.
});