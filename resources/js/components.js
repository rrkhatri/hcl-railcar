import Vue from "vue";

Vue.component('login', require('./components/auth/Login.vue').default);
Vue.component('railcar-list', require('./components/railcars/Index.vue').default);
Vue.component('railcar-create', require('./components/railcars/Create.vue').default);
Vue.component('railcar-edit', require('./components/railcars/Edit.vue').default);

Vue.component('navbar', require('./components/Navbar.vue').default);
Vue.component('flash', require('./components/Flash.vue').default);
Vue.component('validation-errors', require('./components/ValidationErrors.vue').default);
