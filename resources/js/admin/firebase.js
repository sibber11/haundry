import axios from "axios";
// Your web app's Firebase configuration
const firebaseConfig = {
    apiKey: import.meta.env.VITE_FIREBASE_API_KEY,
    authDomain: import.meta.env.VITE_FIREBASE_AUTH_DOMAIN,
    projectId: import.meta.env.VITE_FIREBASE_PROJECT_ID,
    storageBucket: import.meta.env.VITE_FIREBASE_STORAGE_BUCKET,
    messagingSenderId: import.meta.env.VITE_FIREBASE_MESSAGING_SENDER_ID,
    appId: import.meta.env.VITE_FIREBASE_APP_ID,
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);

const messaging = firebase.messaging();

function initFirebaseMessagingRegistration() {
    messaging.requestPermission().then(function () {
        return messaging.getToken()
    }).then(function (token) {

        axios.post(fcmToken, {
            _method: "PATCH",
            token
        }).then(({data}) => {
            //console.log(data)
        }).catch(({response: {data}}) => {
            console.error(data)
        })

    }).catch(function (err) {
        console.log(`Token Error :: ${err}`);
    });
}

initFirebaseMessagingRegistration();

messaging.onMessage(function ({data: {body, title}}) {
    new Notification(title, {body});
});
