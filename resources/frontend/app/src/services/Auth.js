import Vue from 'vue'

export class Auth {

  static check () {
    let authData = this.getAuthData()
    return authData && authData.token
  }

  static getToken () {
    return this.getAuthData().token
  }

  static getUser () {
    return this.getAuthData().user
  }

  static logout (showAsk) {
    if (showAsk) {
      Vue.swal({
        title: 'Deseja realmente sair?',
        text: 'Esta ação pode ser irreversível!',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim! Sei o que estou fazendo',
        cancelButtonText: 'Cancelar'
      })
      .then((response) => {
        if (response.value) {
          this.clearSession()
        }
      })
    } else {
      this.clearSession()
    }
  }

  static clearSession () {
    localStorage.clear()
    location.href = '/login'
    window.location.reload()
  }

  static getAuthData () {
    let authData = this.getAuthDataDecoded()
    return authData ? JSON.parse(authData) : authData
  }

  static getAuthDataDecoded () {
    let authDataEncoded = localStorage.getItem('token')
    return authDataEncoded ? atob(atob(authDataEncoded)) : false
  }

}