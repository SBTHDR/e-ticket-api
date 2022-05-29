import Vue from 'vue';
import DatePicker from 'vue2-datepicker';
import vSelect from 'vue-select'

import 'vue2-datepicker/index.css';
import 'vue-select/dist/vue-select.css';

require('./bootstrap');


Vue.component('add-train', require('./components/AddTrain').default);
Vue.component('home', require('./components/Home').default);
Vue.component('v-date-picker', DatePicker);
Vue.component('v-select', vSelect);

const app = new Vue({
    el: '#app',
});
