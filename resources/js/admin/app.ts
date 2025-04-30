import './bootstrap';

import { createApp } from 'vue';
import App from './App.vue';
import store from './store';
import {Store} from 'vuex';

import { Quasar } from 'quasar'

import '@quasar/extras/material-icons/material-icons.css';
import '@quasar/extras/fontawesome-v5/fontawesome-v5.css'
import 'quasar/src/css/index.sass';


const app = createApp(App);

declare module '@vue/runtime-core' {
    export interface ComponentCustomProperties {
        $store: Store<any>
    }
}

app.use(store);

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
