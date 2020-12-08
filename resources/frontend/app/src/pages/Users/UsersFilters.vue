<template>
  <v-card tile class="elevation-20">
    <v-card-actions>
      <h2>Filtros</h2>
      <v-spacer></v-spacer>
      <v-btn icon @click="refresh()">
        <v-icon>refresh</v-icon>
      </v-btn>
      <v-btn v-if="!show" outlined @click="show = !show">
        Exibir filtros
      </v-btn>
      <v-btn v-else outlined @click="show = !show">
        Ocultar filtros
      </v-btn>
    </v-card-actions>
    <v-scroll-y-transition>
      <div v-if="show">
        <v-divider></v-divider>
        <v-card-text class="users-filters__content">
          <v-row>
            <v-col cols="12" sm="12" md="4" lg="4" xl="4" class="users-filters__content-col">
              <v-text-field 
                v-model="filters.name" 
                label="Pesquise por nome" 
                placeholder="Insira o nome do usuário"  
                outlined
                dense
                prepend-inner-icon="person"
                :disabled="loading"
              ></v-text-field>
            </v-col>
            <v-col cols="12" sm="12" md="4" lg="4" xl="4" class="users-filters__content-col">
              <v-text-field 
                v-model="filters.start_date" 
                label="Data inicial"   
                outlined
                dense
                prepend-inner-icon="today"
                type="datetime-local"
                :disabled="loading"
              ></v-text-field>
              <v-text-field 
                v-model="filters.end_date" 
                label="Data final" 
                outlined
                dense
                prepend-inner-icon="event"
                type="datetime-local"
                :disabled="loading"
              ></v-text-field>
            </v-col>
            <v-col cols="12" sm="12" md="4" lg="4" xl="4" class="users-filters__content-col">
              <v-container class="user-filters__login-top">
                <v-row>
                  <v-col cols="12" class="user-filters__login-top-col-top">
                    <v-btn 
                      block 
                      color="grey"  
                      large 
                      class="user-filters__button-10"
                      :class="{'white--text': (filters.loginTop && filters.loginTop == 'more')}"
                      :outlined="!(filters.loginTop && filters.loginTop == 'more')"
                      @click="setLoginTop('more')"
                    >Top 10 mais fizeram login
                    </v-btn>
                  </v-col>
                  <v-col cols="12" class="user-filters__login-top-col-bottom">
                    <v-btn 
                      block 
                      color="grey" 
                      large 
                      class="user-filters__button-10"
                      :class="{'white--text': (filters.loginTop && filters.loginTop == 'minus')}"
                      :outlined="!(filters.loginTop && filters.loginTop == 'minus')"
                      @click="setLoginTop('minus')"
                    >Top 10 menos fizeram login</v-btn>
                  </v-col>
                </v-row>
              </v-container>
            </v-col>
          </v-row>
        </v-card-text>
        <v-divider></v-divider>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn outlined color="red" @click="clearFilters()">Limpar Filtros</v-btn>
          <v-btn outlined color="primary" @click="aplyFilters()" :disabled="!filtersIsValid()" :loading="loading">Aplicar Filtros</v-btn>
        </v-card-actions>
      </div>
    </v-scroll-y-transition>
  </v-card>
</template>
<script>
  import { mapState } from 'vuex'
  export default {
    name: 'UsersFilters',
    data: () => ({
      show: false,
      filters: {},
      loginTop: null
    }),
    computed: {
      ...mapState(['loading']),
      ...mapState('Users', ['users'])
    },
    methods: {
      aplyFilters: function () {
        this.$store.commit('Users/SET_PARAMS', this.filters)
        this.$store.commit('Users/SET_PARAMS', {page: 1})
        this.$store.dispatch('Users/get')
      },
      clearFilters: function () {
        this.$store.commit('Users/REMOVE_PARAMS', this.filters)
        this.$store.commit('Users/SET_PARAMS', {page: 1})
        this.filters = {}
        this.$store.dispatch('Users/get')
      },
      filtersIsValid: function () {
        let filters = this.filters
        return ((filters.name || filters.loginTop) || ( ( !filters.start_date && !filters.end_date )|| ( filters.start_date && filters.end_date )))
      },
      setLoginTop: function (data) {
        this.filters['loginTop'] = data
        this.$forceUpdate()
      },
      refresh: function () {
        this.$store.dispatch('Users/get')
      }
    }
  }
</script>
<style scoped>
  .users-filters__content {
    padding-bottom: 0 !important;
  }
  .users-filters__content-col {
    padding-bottom: 0 !important;
  }
  .user-filters__button-10 {
    height: 40px !important;
  }
  .user-filters__login-top {
    padding: 0 !important;
  }
  .user-filters__login-top-col-top {
    padding-top: 0 !important;
  }
  .user-filters__login-top-col-bottom {
    padding-bottom: 0 !important;
  }
</style>