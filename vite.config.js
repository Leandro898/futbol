import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', // Asegúrate de que este archivo esté correctamente referenciado
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});