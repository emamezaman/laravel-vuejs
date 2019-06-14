
import Vue from 'vue';
import axios from 'axios';
import VueRouter from 'vue-router';
 // import  BS from 'bootstrap/dist/css/bootstrap.css';
  
 window.$ = window.jQuery = require('jquery');
 
  //let BSd = require('bootstrap-select');
  // let BSds = require('bootstrap/dist/css/bootstrap.css');

window.Vue = Vue;
Vue.use(VueRouter);
// Vue.use(jquery);
// Vue.use(BS);
 
window.axios = axios;

 
// window.axios.defaults.headers.common = {
// 	'X-Requested-With' :'XMLHttpRequest',
//     'X-CSRF-TOKEN': window.laravel.token
// };5

 
let token = document.head.querySelector('meta[name="csrf-token"]');


if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

 
