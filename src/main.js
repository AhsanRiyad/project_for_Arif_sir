// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import Hi from './components/hi'


Vue.config.productionTip = false

Vue.component('App' , App );
Vue.component('Hi' , Hi );


/* eslint-disable no-new */
new Vue({
  el: '#app',
  components: { Hi },
  
})
