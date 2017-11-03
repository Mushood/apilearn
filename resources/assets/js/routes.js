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

];

export default new VueRouter({
    routes,
    linkActiveClass: 'is-active'
});
