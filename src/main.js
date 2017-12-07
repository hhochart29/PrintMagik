// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'

// Materialize CSS
import 'materialize-css' // It installs the JS asset only
import 'materialize-css/dist/css/materialize.css'

// Vee form validate handler
import veeValidate from 'vee-validate'

Vue.config.productionTip = false

const eventHub = new Vue() // Single event hub
// Distribute to components using global mixin
Vue.mixin({
  data: function () {
    return {
      eventHub: eventHub
    }
  }
})

/* eslint-disable no-new */
Vue.use(veeValidate)
new Vue({
  el: '#app',
  router,
  template: '<App/>',
  components: {App}
})
