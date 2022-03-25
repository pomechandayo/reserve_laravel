import Vue from 'vue'
import axios from 'axios'
import Reserve from './components/page/reserve'

Vue.prototype.$http = axios;
require('./bootstrap');

Vue.component('reserve-component',require('./components/page/reserve.vue').default);

new Vue({
}).$mount('#app')