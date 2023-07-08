import { createApp } from 'vue';
import App from './views/telaCadastro/Cadastro.vue';
import router from './router';

createApp(App)
  .use(router)
  .mount('#app');