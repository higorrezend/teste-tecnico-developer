import Vue from 'vue'

export default {
  namespaced: true,
  state: {
    users: []
  },
  mutations: {
    SET_USERS (state, users) {
      state.users = users
    }
  },
  actions: {
    executes ({commit}) {
      Vue.prototype.$api.get('users/user')
      .then(response => ( commit('SET_USERS', response.data) ))
    },
    credentialsIsValid: ({dispatch}, data) => {
      if (data && data.status === 'success') {
        return dispatch('saveCredentials', data.data)
      }
      return false
    },
    saveCredentials: (context, credentials) => {
      return localStorage.setItem('token', credentials.token)
    }
  }
}