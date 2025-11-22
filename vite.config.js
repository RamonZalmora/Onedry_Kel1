import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
<<<<<<< HEAD
=======
import tailwindcss from '@tailwindcss/vite';
>>>>>>> e4a0c53a79b5a34b9b0b79a9bc35d2252b30c210

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
<<<<<<< HEAD
=======
        tailwindcss(),
>>>>>>> e4a0c53a79b5a34b9b0b79a9bc35d2252b30c210
    ],
});
