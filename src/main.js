// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css';
import axios from 'axios';


var VueResource = require('vue-resource');

Vue.use(VueResource);
Vue.use(axios);
Vue.use(Vuetify);

Vue.config.productionTip = false

/* eslint-disable no-new */
new Vue({
  el: '#app',
  vuetify: new Vuetify(),
  methods: {
    vue_resource: function(){

      

      return 'hi';
    }
  }
})
