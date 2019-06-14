import VueRouter from 'vue-router';

let routes = [{
        path: '/admin/news',
        component: require('./components/admin/news')
    },
    {
        path: '/admin/amaresite',
        component: require('./components/admin/amaresite')
    },
    {
        name:'listArticle',
        path: '/admin/articles',
        component: require('./components/admin/article/articles')
    },
     {
        name:'createArticle',
        path: '/admin/article/create/form',
        component: require('./components/admin/article/ArticleCreate')
    },
    { 
        name:'updateArticle',
        path: '/admin/article/:id/edit',
        component: require('./components/admin/article/EditArticle')
    },
    {
       name:'showArticle',
        path: '/admin/article/:id',
        component: require('./components/admin/article/single')
    },
    
    {
        name:'createCategory',
        path: '/admin/category/create',
        component: require('./components/admin/category/createCategory')
    },
    {
        name:'listCategory',
        path: '/admin/category',
        component: require('./components/admin/category/listCategory')
    }, {
        name:'showCategory',
        path: '/admin/category/:id/show',
        component: require('./components/admin/category/showCategory')
    },{
        name:'editCategory',
        path: '/admin/category/:id/edit',
        component: require('./components/admin/category/editCategory')
    },
    {
        name:'deleteCategory',
        path: '/admin/category/:id/delete',
        component: require('./components/admin/category/deleteCategory')
    },
    {
        name:'listUser',
        path: '/admin/user',
        component: require('./components/admin/user/index')
    },
     {
        name:'editUser',
        path: '/admin/user/:id/edit',
        component: require('./components/admin/user/edit')
      },
      {
        name:'addUser',
        path: '/admin/user/create',
        component: require('./components/admin/user/create')
      }
    
];

export default new VueRouter({
    routes
});
