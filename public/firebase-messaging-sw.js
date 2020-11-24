importScripts("https://www.gstatic.com/firebasejs/8.1.1/firebase-app.js");
importScripts(
    "https://www.gstatic.com/firebasejs/8.1.1/firebase-messaging.js",
);
// For an optimal experience using Cloud Messaging, also add the Firebase SDK for Analytics.
importScripts(
    "https://www.gstatic.com/firebasejs/8.1.1/firebase-analytics.js",
);

// Initialize the Firebase app in the service worker by passing in the
// messagingSenderId.
firebase.initializeApp({
    messagingSenderId: "380833687706",
    apiKey: "AIzaSyDNITRMjPnUsnGFbfKCWCWJ2mdXWcVe6rE",
    projectId: "xuongmoc-c1e83",
    appId: "1:380833687706:web:0b98ae685bd9036d0c5723",
});
var link = "";
// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();
self.addEventListener('notificationclick', function(event){
    event.notification.close();
    event.waitUntil(
        clients.openWindow(link));
});
messaging.setBackgroundMessageHandler(function(payload) {
    console.log(
        "[firebase-messaging-sw.js] Received background message ",
        payload,
    );
    link = payload.data.url;
    // Customize notification here
    const notificationTitle = payload.data.title;
    const notificationOptions = {
        // body: payload.data.content,
        image: payload.data.image,
        body: payload.data.content,
        icon: "https://xuongmoc.org/shop/images/logo.png",
    };
    return self.registration.showNotification(
        notificationTitle,
        notificationOptions,
    );
});