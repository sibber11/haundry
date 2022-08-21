require('./bootstrap');
require('admin-lte');

window.Vue = require('vue');

const app = Vue.createApp({});

const files = require.context('./', true, /.vue$/i);
files.keys().map(function (key) {
app.component(key.split('/').pop().split('.')[0], files(key).default);
});

app.mount('#app');
