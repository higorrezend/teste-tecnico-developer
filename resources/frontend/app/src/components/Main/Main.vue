<template>
  <v-app>
    <v-app-bar app :inverted-scroll="false">
      <v-app-bar-nav-icon class="d-flex d-lg-none" @click.stop="toggleDrawer()"></v-app-bar-nav-icon>
      <v-toolbar-title class="d-none d-lg-flex main__toolbar-title">
        Teste Técnico Developer
      </v-toolbar-title>
      <v-progress-linear
        :active="loading"
        :indeterminate="loading"
        absolute
        bottom
        color="primary"
      ></v-progress-linear>
      <v-spacer></v-spacer>
        <v-toolbar-title class="d-flex d-lg-none">
          <v-img src="/assets/logo/logo-dealer-sites.png" width="150"/>
        </v-toolbar-title>
      <v-spacer></v-spacer>
      <v-btn text @click="logout()">
        <v-icon>exit_to_app</v-icon>
        <span>Sair</span>
      </v-btn>
    </v-app-bar>
    <v-navigation-drawer v-model="drawer" app fixed>
      <v-app-bar>
        <v-toolbar-title>
          <v-img src="/assets/logo/logo-dealer-sites.png" width="150"/>
        </v-toolbar-title>
      </v-app-bar>
      <v-divider></v-divider>
      <v-list dense nav>
        <v-list-item v-for="(menu, menuKey) in menus" :key="menuKey" link :to="menu.link">
          <v-list-item-icon>
            <v-icon>{{ menu.icon }}</v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title>{{ menu.title }}</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>
    <v-main>
      <router-view></router-view>
    </v-main>
  </v-app>
</template>
<script>
  import { Auth } from '@/services/Auth'
  import { mapState } from 'vuex'
  export default {
    name: 'Main',
    computed: {
      ...mapState(['loading']),
      ...mapState('Main', ['menus']),
      drawer: {
        get () {
          return this.$store.state.Main.drawer
        },
        set (drawer) {
          this.$store.commit('Main/SET_DRAWER', drawer)
        }
      }
    },
    methods: {
      logout: function () {
        Auth.logout('showAsk')
      },
      toggleDrawer: function () {
        this.$store.commit('Main/TOGGLE_DRAWER')
      }
    }
  }
</script>
<style scoped>
  .main__toolbar-title {
    padding-left: 10px;
  }
</style>
