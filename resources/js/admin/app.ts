import './bootstrap';

import { createApp } from 'vue';
import App from './App.vue';
import PrimeVue from 'primevue/config'
import Material from '@primeuix/themes/material';

// PrimeVue components
import Button from "primevue/button"

const app = createApp(App);

app.component('Button', Button);

app.use(PrimeVue, {
    theme: {
        preset: Material,
        options: {
            darkModeSelector: '.p-dark'
        }
    }
});


app.config.compilerOptions.isCustomElement = (tag: any) => tag.includes('-');

app.mount('#app');
