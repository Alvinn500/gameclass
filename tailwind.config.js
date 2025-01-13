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
                primary: "#c539ff",
                secondary: "#121212",
                main: "#191b2a ",
                semigray: "rgba(255, 255, 255, 0.1)",
                whiteSubNav: "#2d3144",
                semiblack: "#141414",
                purple: "#7200ff",
                indigoCustom: "#383d6e",
            },
            textColor: {
                primary: "#c539ff",
                secondary: "#121212",
                main: "#191b2a ",
                breadcrumb: "#a592f0",
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
