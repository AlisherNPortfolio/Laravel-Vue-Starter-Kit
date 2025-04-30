import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from "@vitejs/plugin-vue";
import { quasar, transformAssetUrls } from '@quasar/vite-plugin'

export default defineConfig({
    plugins: [
        vue({
            version: 3,
            template: {
                transformAssetUrls,
                compilerOptions: {
                    isCustomElement: (tag) => [].includes(tag)
                },
            }
        }),
        laravel({
            input: [
                __dirname + '/resources/css/admin/app.css',
                __dirname + '/resources/js/admin/app.js',
                // __dirname + '/resources/css/client/app.css',
                // __dirname + '/resources/js/client/app.js',
            ],
            refresh: true,
        }),
        quasar({
            autoImportComponentCase: 'kebab',
            sassVariables: new URL('./resources/js/admin/assets/sass/quasar-variables.sass', import.meta.url)
        }),
    ],
});
