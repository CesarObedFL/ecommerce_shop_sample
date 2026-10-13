import { defineConfig, loadEnv } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";
import path from "path";

export default defineConfig(({ mode }) => {
    const envDir = "../../../";

    Object.assign(process.env, loadEnv(mode, envDir));

    return {
        root: __dirname,
        build: {
            emptyOutDir: true,
            manifest: 'manifest.json',
        },
        server: {
            host: process.env.VITE_HOST || "localhost",
            port: process.env.VITE_PORT || 5173,
            cors: true,
        },
        plugins: [
            tailwindcss(),
            laravel({
                hotFile: "../../../public/native-house-vite.hot",
                publicDirectory: "../../../public",
                buildDirectory: "themes/native-house/build",
                input: [
                    "src/Resources/assets/css/app.css",
                    "src/Resources/assets/js/app.js",
                ],
                refresh: ["src/Resources/views/**"],
                experimental: {
                    renderBuiltUrl(filename, { hostId, hostType, type }) {
                        if (hostType === "css") {
                            return path.basename(filename);
                        }
                    },
                },
            }),
        ],
    };
});