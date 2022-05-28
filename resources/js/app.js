import Vue from 'vue';
require('./bootstrap');


Vue.component('add-train', require('./components/AddTrain').default);

const app = new Vue({
    el: '#app',
});
