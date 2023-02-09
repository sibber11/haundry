// /**
//  * First we will load all of this project's JavaScript dependencies which
//  * includes Vue and other libraries. It is a great starting point when
//  * building robust, powerful web applications using Vue and Laravel.
//  */
//
//
require('../bootstrap');
// require('admin-lte');
//
window.Vue = require('vue');

const app = Vue.createApp({});
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
const files = require.context('./', true, /.vue$/i);
files.keys().map(function (key) {
    app.component(key.split('/').pop().split('.')[0], files(key).default);
});

app.mount('#app');
// Your web app's Firebase configuration
const firebaseConfig = {
    authDomain: process.env.FIREBASE_AUTH_DOMAIN,
    storageBucket: process.env.FIREBASE_STORAGE_BUCKET,
    apiKey: process.env.FIREBASE_API_KEY,
    projectId: process.env.FIREBASE_PROJECT_ID,
    messagingSenderId: process.env.FIREBASE_MESSAGING_SENDER_ID,
    appId: process.env.FIREBASE_APP_ID
};
// Initialize Firebase

try {
    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();
} catch (e) {

}


function initFirebaseMessagingRegistration() {
    messaging.requestPermission().then(function () {
        return messaging.getToken()
    }).then(function (token) {

        axios.post(fcmToken, {
            _method: "PATCH",
            token
        }).then(({data}) => {
            console.log(data)
        }).catch(({response: {data}}) => {
            console.error(data)
        })

    }).catch(function (err) {
        console.log(`Token Error :: ${err}`);
    });
}

try {
    initFirebaseMessagingRegistration();

    messaging.onMessage(function ({data: {body, title}}) {
        new Notification(title, {body});
    });
} catch (e) {

}
