<template>
  <v-card tile class="elevation-20">
    <v-data-table 
      :options.sync="options" 
      :server-items-length="totalUsers" 
      :headers="headers" 
      :items="users" 
      :loading="loading" 
      :page.sync="params.page"
      :items-per-page="params.perPage"
      :fixed-header="true"
      :height="innerHeight"
      class="elevation-20"
      footer-props.prev-icon="navigate_before"
      footer-props.next-icon="navigate_next"
      footer.page-text="Por página"
      loading-text="Buscando usuários... Por favor aguarde."
      items-per-page-all-text="Usuários por página"
      :footer-props="{
        showFirstLastPage: true,
        firstIcon: 'first_page',
        lastIcon: 'last_page',
        prevIcon: 'navigate_before',
        nextIcon: 'navigate_next',
        'items-per-page-text': 'Usuários por página',
        'items-per-page-options': [10, 20, 30, 100]
      }"
    >
      <template v-slot:item.name="{ item }">
        <strong>{{item.name}}</strong>
      </template>
      <template v-slot:item.logins="{ item }">
        <strong class="users-table__logins">{{item.logins}}</strong>
      </template>
      <template v-slot:item.active="{ item }">
        <span v-if="item.active" class="users-table__active users-table__active--true">Ativo</span>
        <span v-else class="users-table__active users-table__active--false">Inativo</span>
      </template>
      <template v-slot:footer.page-text="{ pageStart, pageStop, itemsLength }">
        {{pageStart}} a {{pageStop}} de {{itemsLength}}
      </template>
      <template v-slot:no-data>
        <v-container>
          <v-row justify="center">
            <v-col class="text-center" cols="12" sm="12" md="10" lg="10">
              <img src="/assets/emoji/bad.png" width="100px"/>
              <h2>
                Nenhum usuário encontrado.
              </h2>
            </v-col>
          </v-row>
        </v-container>
      </template>
    </v-data-table>
  </v-card>
</template>
<script>
  import { mapState } from 'vuex'
  export default {
    name: 'UsersTable',
    data: () => {
      return {
        headers: [
          { text: 'Nome', value: 'name' },
          { text: 'email', value: 'email', sortable: false },
          { text: 'Número de logins', value: 'logins', sortable: true, align: 'center' },
          { text: 'Situação', value: 'active', sortable: false, align: 'center' }
        ],
        options: {},
        innerHeight: window.innerHeight - 280
      }
    },
    computed: {
      ...mapState(['loading']),
      ...mapState('Users', ['users', 'totalUsers', 'params']),
    },
    watch: {
      options: {
        handler () {
          let params = {}
          params['perPage'] = this.options.itemsPerPage
          params['page'] = this.options.page
          if (this.options.sortBy.length > 0) {
            params['order'] = this.options.sortBy[0]
          }
          if (this.options.sortDesc.length > 0) {
            params['order'] += this.options.sortDesc[0] ? ',desc' : ',asc'
          }
          this.$store.commit('Users/SET_PARAMS', params)
          this.$store.dispatch('Users/get')
        },
        deep: true,
      },
    }
  }
</script>
<style scoped>
  .users-table__active {
    border-style: solid;
    border-width: 1px;
    padding: 2px 10px;
    font-weight: bold;
    text-transform: uppercase;
  }
  .users-table__active--true {
    border-color: green;
    background: rgba(2, 110, 2, 0.418);
    color: white;
  }
  .users-table__active--false {
    border-color: red;
    background: rgba(136, 2, 2, 0.5);
    color: white;
  }
  .users-table__logins {
    font-size: 25px;
  }
</style>
