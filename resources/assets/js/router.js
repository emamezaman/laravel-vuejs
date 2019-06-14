import VueRouter from 'vue-router';

let routes = [
{
        path: '/',
        component: require('./components/index/index')
   },
    {
        path: '/about',
        component: require('./components/about.vue')
    },
    {
        path: '/contact',
        component: require('./components/contact.vue')
    }, 
    {
        path: '/user/profile',
        name:'userProfile',
        component: require('./components/user/user')
    },
    {
        path: '/login',
        name:'login',
        component: require('./components/login')
    },
    {
        path: '/register',
        name:'register',
        component: require('./components/register')
    },
    
];

export default new VueRouter({
    routes
});
