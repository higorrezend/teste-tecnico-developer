import Vue from 'vue'
import App from './App.vue'
import vuetify from './plugins/vuetify'
import router from './plugins/router'
import store from './store/store'
import axios from './plugins/axios'
import sweetalert from './plugins/sweetalert'

Vue.config.productionTip = false

new Vue({
  vuetify,
  router,
  store,
  axios,
  sweetalert,
  render: h => h(App)
}).$mount('#app')
