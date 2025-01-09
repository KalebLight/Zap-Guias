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
        screens: {
            xs: "400px",
            sm: "640px",
            md: "768px",
            lg: "1024px",
            xl: "1280px",
            "2xl": "1536px",
        },

        extend: {
            boxShadow: {
                custom: "4px 4px 0px rgba(25, 40, 41, 1)",
            },
            fontFamily: {
                sans: ["Montserrat", ...defaultTheme.fontFamily.sans],
            },
            underline: false,
            colors: {
                primary: "#192829", //Blue primary
                primaryAnim: "#345254",
                secondary: "#FF874F", //Orange secondary
                buttonPrimary: "#F0E0D9",
                success: "#2ecc71",
                danger: "#e74c3c",
                facebook: "#3B5998",
            },
        },
    },
    plugins: [forms],
};
