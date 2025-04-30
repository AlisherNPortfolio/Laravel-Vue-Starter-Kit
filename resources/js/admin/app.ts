import './bootstrap';

import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import http from './http-common';
import store from './store';
import {Store} from 'vuex';

import { Quasar, Notify } from 'quasar'

import '@quasar/extras/material-icons/material-icons.css';
import '@quasar/extras/fontawesome-v5/fontawesome-v5.css'
import 'quasar/src/css/index.sass';


const app = createApp(App);

declare module '@vue/runtime-core' {
    export interface ComponentCustomProperties {
        $store: Store<any>
    }
}

app.use(router);
app.use(store);
app.provide('$api', http);

app.use(Quasar, {
    plugins: {
        Notify,
    },
    config: {
        notify: {

        }
    }
  })


app.config.compilerOptions.isCustomElement = (tag: any) => tag.includes('-')
app.mount('#app');
