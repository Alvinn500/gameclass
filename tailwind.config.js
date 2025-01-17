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
                primary: "#c539ff",
                secondary: "#121212",
                main: "#171717 ",
                semigray: "rgba(255, 255, 255, 0.1)",
                whiteSubNav: "#2d3144",
                semiblack: "#141414",
                indigoCustom: "#383d6e",
            },
            textColor: {
                primary: "#c539ff",
                secondary: "#121212",
                main: "#191b2a ",
                breadcrumb: "#84cc16",
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
