import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/dashboard.js',
                'resources/js/add-review.js',
                'resources/js/add-review-v2.js',
                'resources/js/csrf.js',
            ],
            refresh: true,
        }),
    ],
});
