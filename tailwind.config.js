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
            colors: {
                primary: {
                    DEFAULT: "#C9956C",
                    hover: "#B8845B",
                    light: "#E8C4AA",
                    soft: "#F7E8E2",
                },

                blush: {
                    DEFAULT: "#F2D0C4",
                    soft: "#FDF1EC",
                    light: "#FFF7F4",
                },

                cream: {
                    DEFAULT: "#FDFBF9",
                    dark: "#F7EFEA",
                },

                brown: {
                    DEFAULT: "#3B2A27",
                    soft: "#7A6A66",
                    light: "#A8958E",
                },

                gold: {
                    DEFAULT: "#C9956C",
                    soft: "#F4D8C2",
                },

                border: {
                    DEFAULT: "#E8DDD7",
                    soft: "#F1E7E2",
                },

                success: {
                    DEFAULT: "#6FAF7B",
                    soft: "#EAF6ED",
                },

                danger: {
                    DEFAULT: "#D65C5C",
                    soft: "#FBEAEA",
                },
            },

            fontFamily: {
                sans: ["Inter", "Figtree", ...defaultTheme.fontFamily.sans],
                display: ["Cormorant Garamond", "serif"],
            },

            borderRadius: {
                soft: "1rem",
                card: "1.5rem",
                pill: "999px",
            },

            boxShadow: {
                soft: "0 8px 30px rgba(61, 31, 31, 0.06)",
                card: "0 12px 40px rgba(61, 31, 31, 0.08)",
            },
        },
    },

    plugins: [],
};
