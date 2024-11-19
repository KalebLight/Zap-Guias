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
            boxShadow: {
                custom: "6px 6px 0px rgba(25, 40, 41, 1)",
            },
            fontFamily: {
                sans: ["Montserrat", ...defaultTheme.fontFamily.sans],
            },
            underline: false,
            colors: {
                primary: "#192829", //Blue primary
                primaryAnim: "#345254",
                secondary: "#FF874F", //Orange secondary
                success: "#2ecc71",
                danger: "#e74c3c",
            },
        },
    },
    plugins: [forms],
};
