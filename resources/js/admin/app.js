import axios from 'axios';
import {createApp} from 'vue/dist/vue.esm-bundler.js';
import LaundryTypeFields from "@/components/LaundryTypeFields.vue";
import AdminOrderFields from "@/components/AdminOrderFields.vue";
import Multiselect from 'vue-multiselect'

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
axios.defaults.withCredentials = true;

const app = createApp({});

app.component('AdminOrderFields', AdminOrderFields);
app.component('LaundryTypeFields', LaundryTypeFields);
app.component('multiselect', Multiselect)

app.mount('#app');
// Your web app's Firebase configuration
const firebaseConfig = {
    authDomain: import.meta.env.FIREBASE_AUTH_DOMAIN,
    storageBucket: import.meta.env.FIREBASE_STORAGE_BUCKET,
    apiKey: import.meta.env.FIREBASE_API_KEY,
    projectId: import.meta.env.FIREBASE_PROJECT_ID,
    messagingSenderId: import.meta.env.FIREBASE_MESSAGING_SENDER_ID,
    appId: import.meta.env.FIREBASE_APP_ID
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
