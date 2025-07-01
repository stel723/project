import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/canvas.js',
                'resources/css/game.css'
            ],
            refresh: true,
        }),
    ],
});
