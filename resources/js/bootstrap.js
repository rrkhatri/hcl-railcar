window._ = require('lodash');

try {
    require('bootstrap');
} catch (e) {}


window.axios = require('axios');

axios.interceptors.request.use(function (config) {
    if (localStorage.getItem('token')) {
        config.headers.Authorization = 'Bearer ' + localStorage.getItem('token');
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token');
    }

    return config;
});

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });
