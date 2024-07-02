import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        host: '0.0.0.0', // Allows access from network
        port: 5173, // Default Vite port, change if needed
        hmr: {
            host: '192.168.1.101', // Replace with your local IP address
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
