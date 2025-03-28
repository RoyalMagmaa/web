import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/style-base.css','resources/css/style-login.css','resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    assetsInclude: ['**/*.php'], // Ajoutez cette ligne pour inclure les fichiers PHP comme assets
});
