import Vue from 'vue';
import Vuetify from 'vuetify/lib/framework';

Vue.use(Vuetify);

export default new Vuetify({
  theme: {
    themes: {
      light: {
        primary: '#34A0B1',
        secondary: '#FFFFFF',
        accent: '#353B46'
      }
    }
  }
})
