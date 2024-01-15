import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    base:'/',
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/togglePassword.js',
                'resources/js/riwayatForm.js',
                'resources/js/uploadImage.js',
                'resources/js/datepicker.js',
                'resources/js/closeFlash.js',
            ],
            refresh: true,
        }),
    ],
    define: {
        __APP_ENV__: process.env.VITE_VERCEL_ENV,
    },  
});
