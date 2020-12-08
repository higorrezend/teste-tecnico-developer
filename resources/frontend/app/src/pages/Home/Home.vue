<template>
<v-container>
  <v-row justify="center">
    <v-col cols="12" sm="12" md="10" lg="10">
      <h1>Bem-vindo(a) ao Teste Técnico Developer</h1>
      <h2><router-link :to="{name: 'users'}">Clique aqui</router-link> para acessar a lista de usuários cadastrados.</h2>
    </v-col>
  </v-row>
  <v-row justify="center">
    <v-col cols="12" sm="12" md="10" lg="10">
      <h3>Descrição do projeto:</h3>
      <p>
        <ul data-sourcepos="12:1-30:0" dir="auto">
          <li data-sourcepos="12:1-12:57">Ambiente de desenvolvimento provisionado com Docker;</li>
          <li data-sourcepos="13:1-13:32">Banco de dados MariaDB 10.5.6;</li>
          <li data-sourcepos="14:1-14:60">Projeto desenvolvido em PHP, usando o framework Laravel 8;</li>
          <li data-sourcepos="15:1-15:36">Tabelas criadas usando migrations;</li>
          <li data-sourcepos="16:1-16:79">A estrutura do banco (UML) criada com MySQL Workbench está junto ao projeto;</li>
          <li data-sourcepos="17:1-17:179">O banco de dados foi populado utilizando Seeders e os dados foram criados aleatoriamente usando a biblioteca Faker. Users com 8.000 registros e Users_acess com 18.000 registros;</li>
          <li data-sourcepos="18:1-18:79">O frontend foi desenvolvido usando o framework VueJS e compilado com Vue Cli.</li>
          <li data-sourcepos="19:1-19:64">Foi usado o framework para estilização do front-end Vuetify;</li>
          <li data-sourcepos="20:1-20:40">Toda a aplicação é 100% responsiva;</li>
          <li data-sourcepos="21:1-22:48">Foi implementada uma API Restful com autenticação via token no header. Para obter o token o usuário deve se autenticar informando o login e a senha a seguir:<br>
          <code>teste@dealersites.com.br</code> e <code>DealerSites@2020</code>;</li>
          <li data-sourcepos="23:1-23:141">Os filtros, ordenação, carregamento e paginação desenvolvidos buscam as informações na API usando Axios e passando o token no header;</li>
          <li data-sourcepos="24:1-24:92">Todo código do frontend (HTML, CSS e JavaScript) estão na pasta /resources/frontend/app;</li>
          <li data-sourcepos="25:1-25:172">O código do frontend foi compilado usando o Vue Cli, onde o código HTML está no arquivo /resources/views/app.blade.php e os assets (CSS e JavaScript) na pasta /public;</li>
          <li data-sourcepos="26:1-27:47">Caso queira executar o frontend usando Vue Cli use os seguintes comandos:<br>
          <code>cd resources/frontend/app/</code>, depois, <code>npm install</code> para baixar as dependências e <code>npm run serve</code> para subir a aplicação;</li>
          <li data-sourcepos="28:1-30:0">Efetuiei o deploy da aplicação para uma VPS e caso queiram <a href="http://191.252.182.30:8000" title="Acessar a aplicação" rel="nofollow noreferrer noopener" target="_blank">a aplicação pode ser acessada clicando aqui.</a>
          </li>
        </ul>
      </p>
    </v-col>
  </v-row>
</v-container>
</template>
<script>
  export default {
    name: 'Home'
  }
</script>
