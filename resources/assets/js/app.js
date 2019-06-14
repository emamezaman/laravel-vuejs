

import './bootstrap';


import MyHeader  from './components/my-header.vue';
import MyFooter  from './components/footer.vue';
import Sidebar   from './components/sidebar.vue';
// import AppLayout from './components/appLayout.vue';
import router    from './router';
 
// Vue.component('appLayout',AppLayout);
Vue.component('myHeader',MyHeader);
Vue.component('my-footer',MyFooter);
Vue.component('my-sidebar',Sidebar);

// Vue.filter('size',function(value=''){
//    return value.toString().length;
// });
// Vue.filter('capitalize',function(value=''){
// 	value = value.toString();
//    return value.charAt(0).toUpperCase() + value.slice(1);
// });
// Vue.directive('mytext',{
// bind(el,binding,vnode){
//    el.innerHTML = binding.value;
// }
// });



let app = new Vue({
    el: '#app',
	router
})
