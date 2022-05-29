import Vue from 'vue';
import DatePicker from 'vue2-datepicker';

import 'vue2-datepicker/index.css';

require('./bootstrap');


Vue.component('add-train', require('./components/AddTrain').default);
Vue.component('v-date-picker', DatePicker);

const app = new Vue({
    el: '#app',
});
