// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'
import 'materialize-css' // It installs the JS asset only
import 'materialize-css/dist/css/materialize.css'
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

// Form validation
Vue.use(veeValidate)

new Vue({ // eslint-disable-line no-new
  el: '#app',
  router,
  template: '<App/>',
  components: {App}
})
