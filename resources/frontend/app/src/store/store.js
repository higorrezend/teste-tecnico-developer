import Vue from 'vue'
import Vuex from 'vuex'
import Login from '@/store/modules/Login/Login'
import Main from '@/store/modules/Main/Main'
import Users from '@/store/modules/Users/Users'

Vue.use(Vuex)

const store = new Vuex.Store({
  state: {
    loading: false
  },
  mutations: {
    SET_LOADING (state, loading) {
      state.loading = loading
    }
  },
  modules: {
    Login,
    Main,
    Users
  }
})

export default store