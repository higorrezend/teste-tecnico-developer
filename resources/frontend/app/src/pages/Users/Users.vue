<template>
    <v-container>
      <v-row justify="center">
        <v-col cols="12" sm="12" md="10" lg="10">
          <UsersFilters/>
        </v-col>
        <v-col cols="12" sm="12" md="10" lg="10">
          <UsersTable/>
        </v-col>
      </v-row>
    </v-container>
</template>
<script>
  import { mapState } from 'vuex'
  import UsersTable from '@/pages/Users/UsersTable'
  import UsersFilters from '@/pages/Users/UsersFilters'
  export default {
    name: 'Users',
    computed: {
      ...mapState('Users', ['users']),
    },
    components: {
      UsersTable,
      UsersFilters
    }
  }
</script>
<style scoped>
  .users-table__active {
    border-style: solid;
    border-width: 1px;
    padding: 5px 10px;
    border-radius: 5px;
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
    color: black;
  }
</style>