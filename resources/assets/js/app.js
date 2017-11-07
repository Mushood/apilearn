
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import router from './routes';

import VueSweetalert2 from 'vue-sweetalert2';
import SimpleVueValidation from 'simple-vue-validator';
import MultipleFileUploader from 'vue2-multi-uploader'

window.Vue = require('vue');
Vue.use(VueSweetalert2);
Vue.use(SimpleVueValidation);

Vue.component('file-upload',require('./components/FileUpload.vue'));
Vue.component('multiple-custom-file-upload',require('./components/FileUploadMultiple.vue'));
Vue.component('MultipleFileUploader', MultipleFileUploader);

window.Event = new Vue();
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


const app = new Vue({
    el: '#app',

    router
});


/* code for api
 Vue.component(
     'passport-clients',
     require('./components/passport/Clients.vue')
 );

 Vue.component(
     'passport-authorized-clients',
     require('./components/passport/AuthorizedClients.vue')
 );

 Vue.component(
     'passport-personal-access-tokens',
     require('./components/passport/PersonalAccessTokens.vue')
 );

Vue.component('example', require('./components/Example.vue'));
*/
