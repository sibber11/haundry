import axios from 'axios';
import {createApp} from 'vue/dist/vue.esm-bundler.js';
import LaundryTypeFields from "@/components/LaundryTypeFields.vue";
import AdminOrderFields from "@/components/AdminOrderFields.vue";
import Multiselect from 'vue-multiselect';

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
axios.defaults.withCredentials = true;

const app = createApp({});

app.component('AdminOrderFields', AdminOrderFields);
app.component('LaundryTypeFields', LaundryTypeFields);
app.component('multiselect', Multiselect)

app.mount('#app');
