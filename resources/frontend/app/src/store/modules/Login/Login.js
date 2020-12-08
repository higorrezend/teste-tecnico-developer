import Vue from 'vue'

export default {
  namespaced: true,
  state: {test: 'Hello World!'},
  actions: {
    executes ({dispatch}, login) {
      return new Promise((resolve, reject) => {
        Vue.prototype.$api.post('login/auth', login)
        .then(response => ( dispatch('credentialsIsValid', response.data) ? resolve() : reject() ))
        .catch(() => ( reject() ))
      })
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