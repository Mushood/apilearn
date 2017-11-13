import VueRouter from 'vue-router';

let routes = [
    {
        path: '/',
        component: require('./views/home')
    },

    {
        path: '/write',
        component: require('./views/write')
    },

    {
        path: '/gallery',
        component: require('./views/gallery')
    },

    {
        path: '/multiple',
        component: require('./views/multiple')
    },

    {
        path: '/test',
        component: require('./views/test')
    },

];

export default new VueRouter({
    routes,
    linkActiveClass: 'is-active'
});
