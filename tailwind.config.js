import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            colors: {
                primary: {
                    DEFAULT: "#E85D8C",
                    hover: "#D94C7B",
                    light: "#F7A9C2",
                    soft: "#FDE8F0",
                },

                pink: {
                    DEFAULT: "#F48FB1",
                    soft: "#FCE7EF",
                    light: "#FFF4F8",
                },

                red: {
                    DEFAULT: "#E45757",
                    hover: "#CC4545",
                    soft: "#FCEAEA",
                },

                blue: {
                    DEFAULT: "#5B8DEF",
                    hover: "#4777D8",
                    light: "#AFC6F8",
                    soft: "#EDF3FF",
                },

                cream: {
                    DEFAULT: "#FFFDFD",
                    dark: "#F8F4F6",
                },

                ink: {
                    DEFAULT: "#2B2430",
                    soft: "#6F6674",
                    light: "#9A919E",
                },

                border: {
                    DEFAULT: "#E9E4EA",
                    soft: "#F3EFF4",
                },

                success: {
                    DEFAULT: "#5FAF86",
                    soft: "#EAF7F0",
                },

                danger: {
                    DEFAULT: "#E45757",
                    soft: "#FCEAEA",
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
                soft: "0 8px 30px rgba(43, 36, 48, 0.06)",
                card: "0 12px 40px rgba(43, 36, 48, 0.10)",
            },
        },
    },

    plugins: [forms],
};
