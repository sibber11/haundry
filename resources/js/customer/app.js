require('../bootstrap');
window.Vue = require('vue');
const app = Vue.createApp({});
const CustomerOrderFields = require("../components/CustomerOrderFields");
app.component('CustomerOrderFields', CustomerOrderFields.default);
app.mount('#app');
