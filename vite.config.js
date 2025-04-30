import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import vue from "@vitejs/plugin-vue";

export default defineConfig({
    plugins: [
        vue({
            version: 3,
            template: {
                compilerOptions: {
                    isCustomElement: (tag) => [].includes(tag)
                }
            }
        }),
        laravel({
            input: [
                'resources/css/admin/app.css',
                'resources/js/admin/app.js',
                'resources/css/client/app.css',
                'resources/js/client/app.js',
            ],
            refresh: true,
        }),
        tailwindcss(),

    ],
});
