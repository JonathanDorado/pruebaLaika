window.Vue = require('vue');

import VueAxios from 'vue-axios';
import axios from 'axios';

Vue.use(VueAxios, axios);

Vue.component('register-users', require('./components/RegisterUsers.vue').default);
Vue.component('register-emails', require('./components/RegisterEmails.vue').default);
Vue.component('queue', require('./components/Queue.vue').default);


const app = new Vue({
    el: '#app',
    data: {
        option: 1,
    },
    methods: {
        changePage(menu) {
            this.menu = menu;
        }
    },
});