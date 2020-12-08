export default {
  namespaced: true,
  state: {
    drawer: true,
    menus: [
      { title: 'Home', icon: 'home', link: {name: 'home'} },
      { title: 'Usuários', icon: 'people', link: {name: 'users'} }
    ]
  },
  mutations: {
    SET_DRAWER (state, drawer) {
      state.drawer = drawer
    },
    TOGGLE_DRAWER (state) {
      state.drawer = !state.drawer
    }
  }
}
