import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        host: '0.0.0.0', // Ensures Vite is accessible from outside the container
        hmr: {
            host: 'localhost',
        },
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/dashboard.js',
                'resources/js/city-main.js',
                'resources/js/add-review.js',
                'resources/js/csrf.js',
            ],
            refresh: true,
        }),
    ],
});
