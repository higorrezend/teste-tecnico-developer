<template>
  <v-app class="login">
    <v-container>
      <v-row justify="center">
        <v-col cols="12" sm="8" md="6" lg="4">
          <v-card tile class="elevation-20">
            <v-card-text>
              <div class="login__content">
                <v-img src="assets/logo/logo-dealer-sites.png"></v-img>
                <h2>Teste Técnico Developer</h2>
                <div class="login__credentials">
                  <strong>Use os dados abaixo para fazer login:</strong><br>
                  Login: <code>teste@dealersites.com.br</code><br>
                  Senha: <code>DealerSites@2020</code>
                </div>
                <v-form v-model="valid" ref="login" lazy-validation>
                  <div class="login__input">
                    <v-text-field 
                      v-model="login.username" 
                      label="Login" 
                      placeholder="Insira seu login" 
                      :rules="[v => !!v || 'O login é obrigatório']" 
                      outlined
                      prepend-inner-icon="person"
                      autofocus
                    ></v-text-field>
                  </div>
                  <div class="login__input">
                    <v-text-field
                      v-model="login.password" 
                      label="Senha" 
                      placeholder="Insira sua senha" 
                      :rules="[v => !!v || 'A senha é obrigatória']" 
                      outlined
                      prepend-inner-icon="vpn_key" 
                      :type="showPassword ? 'text' : 'password'" 
                      :append-icon="showPassword ? 'visibility' : 'visibility_off'"
                      @click:append="showPassword = !showPassword"
                      @keyup.enter="validateLogin()"
                    ></v-text-field>
                  </div>
                </v-form>
                <div class="login__button">
                  <v-btn 
                    color="primary" 
                    :disabled="!valid" 
                    :loading="loading" 
                    block 
                    @click="validateLogin()"
                  >Acessar</v-btn>
                </div>
              </div>
            </v-card-text>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </v-app>
</template>
<script>
  import {mapState} from 'vuex'
  export default {
    name: 'Login',
    data: () => ({
      valid: false,
      login: {
        username: '',
        password: null
      },
      showPassword: false
    }),
    computed: {
      ...mapState(['loading'])
    },
    methods: {
      validateLogin: function () {
        if (this.$refs.login.validate())
          this.executeLogin()
      },
      executeLogin: function () {
        this.$store.dispatch('Login/executes', this.login)
       .then(() => this.$router.push({name: 'home'}) )
       .catch(() => this.loginError() )
      },
      loginError: function () {
        this.login.password = null
        this.$swal({
          icon: 'warning',
          title: 'Usuário não existe ou senha inválida!',
          text: 'Tente novamente ou contacte o suporte.'
        })
      }
    }
  }
</script>
<style scoped>
  .login {
    background: url('/assets/background/background-login.jpg');
    background-size: cover;
  }
  .login__content {
    padding: 20px;
    text-align: center !important;
  }
  .login__content h2 {
    text-align: center;
    font-size: 25px;
    padding-top: 40px;
    padding-bottom: 10px;
    text-transform: uppercase;
    line-height: initial;
  }
  .login__credentials {
    padding-top: 10px;
    padding-bottom: 30px;
  }
  .login__button {
    margin-top: 20px;
  }
</style>
