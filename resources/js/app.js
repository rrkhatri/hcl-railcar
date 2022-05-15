/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';

window.Vue = Vue;
window.Bus = new Vue;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

Vue.component('railcar-list', require('./components/railcars/Index.vue').default);
Vue.component('railcar-create', require('./components/railcars/Create.vue').default);
Vue.component('railcar-edit', require('./components/railcars/Edit.vue').default);
Vue.component('flash', require('./components/Flash.vue').default);
Vue.component('validation-errors', require('./components/ValidationErrors.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
