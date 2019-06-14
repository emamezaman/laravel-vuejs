

import Vue from 'vue';
import axios from 'axios';
import VueRouter from 'vue-router';
import VeeValidate from 'vee-validate';


window.Vue = Vue;
Vue.use(VueRouter);
Vue.use(VeeValidate);
window.axios = axios;

  //window.$ = window.jQuery = require('jquery');
 //  window.Dropdown  = require('./bootstrap.4.js');
 // require('./popper.js'); 
 // require('./sweetalert.min.js');
   
 
window.axios.defaults.headers.common = {
	'X-Requested-With' :'XMLHttpRequest',
    'X-CSRF-TOKEN': window.laravel.token
};

 
// let token = document.head.querySelector('meta[name="csrf-token"]');


// if (token) {
//     window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
// } else {
//     console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
// }

 
