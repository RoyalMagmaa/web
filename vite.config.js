import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/style-base.css',
                'resources/css/style-candidature.css',
                'resources/css/style-creer.css',
                'resources/css/style-etudiant.css',
                'resources/css/style-focus.css',
                'resources/css/style-liste.css',
                'resources/css/style-login.css',
                'resources/css/style-wishlist.css',
                'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    assetsInclude: ['**/*.php'], // Ajoutez cette ligne pour inclure les fichiers PHP comme assets
});
