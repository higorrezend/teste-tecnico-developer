import Vue from 'vue'
import axios from 'axios'
import store from '@/store/store';
import { Auth } from '@/services/Auth'

Vue.use({
  install (Vue) {

    Vue.prototype.$api = axios.create({
      baseURL: '/api/v1/'
    })

    Vue.prototype.$api.interceptors.request.use((request) => {
      let token = Auth.getToken()
      if (token)
        request.headers['token'] = token
      store.commit('SET_LOADING', true)
      return request
    })

    Vue.prototype.$api.interceptors.response.use((response) => {
      store.commit('SET_LOADING', false)
      return response
    }, (error) => {
      store.commit('SET_LOADING', false)
      return error
    })

  }
})

export default {}