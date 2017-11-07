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

];

export default new VueRouter({
    routes,
    linkActiveClass: 'is-active'
});
