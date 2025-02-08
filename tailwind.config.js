import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                permanentMarker: [
                    "Permanent Marker",
                    ...defaultTheme.fontFamily.serif,
                ],
            },
            backgroundColor: {
                secondary: "#8b5cf6", //violet-500
                main: "#7c3aed", // violet-600
                hover: "#6d28d9", // violet-700
                button: "#6d28d9", // violet-700
                line: "#fff",
                input: "#fff",
                focus: "#8b5cf6", //violet-500
            },
            textColor: {
                title: "#4f46e5",
                bgMain: "#7c3aed",
                main: "#fff",
                secondary: "#e5e5e5",
                breadcrumb: "#fff",
                input: "#262626",
                placehodler: "#737373",
                link: "#7dd3fc", // sky-300
            },
            gradientColorStops: {
                primary: "#8b5cf6", //violet-500,
                secondary: "#121212",
                main: "#191b2a ",
            },
            borderColor: {
                primary: "#8b5cf6",
                main: "#c4b5fd",
            },
            gridTemplateColumns: {
                game: "repeat(4, minmax(100px, 1fr))",
            },
        },
    },
    plugins: [],
};
