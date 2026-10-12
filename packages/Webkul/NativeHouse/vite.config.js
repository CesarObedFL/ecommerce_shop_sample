import { defineConfig, loadEnv } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import path from 'path';

export default defineConfig(({ mode }) => {
    // Load environment variables from the Bagisto root .env file
    const envDir = '../../../';
    Object.assign(process.env, loadEnv(mode, envDir));

    return {
        build: {
            emptyOutDir: true,
            outDir: '../../../public/themes/native-house/build',
            manifest: true,
        },
        server: {
            host: process.env.VITE_HOST || 'localhost',
            port: process.env.VITE_PORT || 5173,
            cors: true,
            hmr: {
                host: process.env.VITE_HMR_HOST || 'localhost',
            },
        },
        plugins: [
            tailwindcss(),
            laravel({
                // The hot file is used by Bagisto to know if the Vite dev server is running
                hotFile: '../../../public/native-house-vite.hot',
                // The public directory relative to the project root
                publicDirectory: '../../../public',
                // The build directory where compiled assets will be placed
                buildDirectory: 'themes/native-house/build',
                // The entry points for your CSS and JS
                input: [
                    'src/Resources/assets/css/app.css',
                    'src/Resources/assets/js/app.js',
                ],
                refresh: [
                    'src/Resources/views/**/*.blade.php',
                ],
            }),
        ],
        resolve: {
            alias: {
                '@': path.resolve(__dirname, 'src/Resources/assets'),
            },
        },
    };
});