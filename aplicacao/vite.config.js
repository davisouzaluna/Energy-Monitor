import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import chartjs from 'chart.js'; // Importe o pacote "chart.js" aqui

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
               
            ],
            refresh: true,
        }),
        
    ],
});
