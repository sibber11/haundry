import '../bootstrap';
import '../../css/customer/app.css';
import '@fortawesome/fontawesome-free/css/all.min.css';
import '@fortawesome/fontawesome-free/css/solid.min.css';
import '@fortawesome/fontawesome-free/css/regular.min.css';

import {createApp} from 'vue/dist/vue.esm-bundler.js';
import CustomerOrderFields from "../components/CustomerOrderFields.vue";
import CustomerOrderReview from "@/components/CustomerOrderReview.vue";

const app = createApp({});

app.component('CustomerOrderFields', CustomerOrderFields);
app.component('CustomerOrderReview', CustomerOrderReview);
app.mount('#app');
