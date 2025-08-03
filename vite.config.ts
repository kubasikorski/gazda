import vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import { defineConfig } from 'vite';

const port = 5173;
const ddevUrl = process.env.DDEV_PRIMARY_URL || 'https://gazda.ddev.site';
const origin = `${ddevUrl}:${port}`;

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.ts'],
            ssr: 'resources/js/ssr.ts',
            refresh: true,
        }),
        tailwindcss(),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    server: {
        host: '0.0.0.0',
        port: 5173,
        watch: {
            usePolling: true,
        },
        strictPort: true,
        origin: `${ddevUrl.replace(/:\d+$/, '')}:5173`,
        cors: {
            origin: [
                /https?:\/\/([A-Za-z0-9\-\.]+)?(\.ddev\.site)(?::\d+)?$/,
                ddevUrl, // Allow requests from your main DDEV URL
                ddevUrl.replace(/:\d+$/, ''), // Allow without port if present
            ],
            credentials: true,
        },
    },
});
