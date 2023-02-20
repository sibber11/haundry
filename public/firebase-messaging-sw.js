importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');

firebase.initializeApp({
    apiKey: "AIzaSyBBdDNLfI5aJBmORnuJUaLFKgy4DqgAwlU",
    projectId: "washersinn-60974",
    messagingSenderId: "965325849062",
    appId: "1:965325849062:web:f66ea1bc6522dac8f31627"
});

const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function ({data: {title, body, icon}}) {
    return self.registration.showNotification(title, {body, icon});
});
