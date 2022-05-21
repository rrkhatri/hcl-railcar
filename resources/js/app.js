import Vue from 'vue';
window.Vue = Vue;
window.Bus = new Vue;

import store from './store/index'

require('./bootstrap');

require('./components');

const app = new Vue({
    el: '#app',
    store: store
});
