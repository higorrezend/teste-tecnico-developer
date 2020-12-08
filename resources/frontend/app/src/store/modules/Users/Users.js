import Vue from 'vue'

export default {
  namespaced: true,
  state: {
    users: [],
    totalUsers: 0,
    params: {
      page: 1,
      perPage: 10
    }
  },
  mutations: {
    SET_USERS (state, users) {
      state.users = users
    },
    SET_TOTAL_USERS (state, totalUsers) {
      state.totalUsers = totalUsers
    },
    SET_PARAMS (state, params) {
      for (const param in params) {
        state.params[param] = params[param]
      }
    },
    REMOVE_PARAMS (state, params) {
      for (const param in params) {
        delete state.params[param]
      }
    }
  },
  actions: {
    get ({state, commit}) {
      Vue.prototype.$api.get('users/user', { params: state.params })
      .then(response => {
        commit('SET_USERS', response.data.data)
        commit('SET_TOTAL_USERS', response.data.total)
      })
      .catch(() => {
        commit('SET_USERS', [])
        commit('SET_TOTAL_USERS', 0)
      })
    }
  }
}