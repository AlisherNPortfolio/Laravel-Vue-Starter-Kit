import './bootstrap';

import { createApp } from 'vue';
import App from './App.vue';

const app = createApp(App);


app.config.compilerOptions.isCustomElement = (tag: any) => tag.includes('-');

app.mount('#app');
