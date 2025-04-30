import './bootstrap';

import { createApp } from 'vue';
import App from './App.vue';

import { Quasar } from 'quasar'

import '@quasar/extras/material-icons/material-icons.css';
import '@quasar/extras/fontawesome-v5/fontawesome-v5.css'
import 'quasar/src/css/index.sass';


const app = createApp(App);


app.use(Quasar, {
    plugins: {
    },
    config: {
        notify: {

        }
    }
  })


app.config.compilerOptions.isCustomElement = (tag: any) => tag.includes('-')
app.mount('#app');
