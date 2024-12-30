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
            },
            backgroundColor: {
                primary: "#121212",
                secondary: "rgba(255, 255, 255, 0.1)",
                tertiary: "#c539ff",
                main: "#191b2a ",
                whiteSubNav: "#2d3144",
                semiblack: "#141414",
                purple: "#7200ff",
            },
            textColor: {
                primary: "#c539ff",
                secondary: "#121212",
            },
            gradientColorStops: {
                primary: "#c539ff",
                secondary: "#121212",
                main: "#191b2a ",
            },
            borderColor: {
                primary: "#c539ff",
                main: "#191b2a ",
            },
        },
    },
    plugins: [],
};
