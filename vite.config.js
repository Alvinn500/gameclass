import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/js/editor.js",
                "resources/js/main.js",
                "resources/js/chart.js",
                "resources/js/game.js",
            ],
            refresh: true,
        }),
    ],
});
