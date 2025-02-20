import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import path from 'path';

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/js/app.js',
                'resources/js/inertia.js'
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '@/*': ["resources/js/*"],
            'ziggy-js': path.resolve('./vendor/tightenco/ziggy'),
        },
    },
});
