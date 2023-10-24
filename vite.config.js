import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        hmr: {
            host: 'localhost',
        },
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/views/js/app.js',
                'resources/views/css/style.css',
                'resources/views/css/bootstrap.min.css',
                'resources/views/css/solid.min.css',
                'resources/views/css/style.css',
                'resources/views/js/rangeSlider.js',
                'resources/views/js/bootstrap.js',
            ],
            refresh: true,
        }),
    ],
});
