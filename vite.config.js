import { defineConfig } from 'vite';
import react from '@vitejs/plugin-react';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.jsx'], // Assurez-vous que votre point d'entrée est correct
            refresh: true,
        }),
        react(), // Ajoute le support de React et JSX
    ],
    server: {
        hmr: {
            host: 'localhost',
        },
        cors: true,
    },
});