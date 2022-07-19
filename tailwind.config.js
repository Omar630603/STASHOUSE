const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },
            keyframes: {
                floatY: {
                    "0%": {
                        shadow: "0 5px 15px 0px rgba(0,0,0,0.6)",
                        transform: "translatey(0px)",
                    },
                    "50%": {
                        shadow: "0 25px 15px 0px rgba(0,0,0,0.2)",
                        transform: "translatey(-20px)",
                    },
                    "100%": {
                        shadow: "0 5px 15px 0px rgba(0,0,0,0.6)",
                        transform: "translatey(0px)",
                    },
                },
                floatX: {
                    "0%": {
                        shadow: "0 5px 15px 0px rgba(0,0,0,0.6)",
                        transform: "translatex(0px)",
                    },
                    "50%": {
                        shadow: "0 25px 15px 0px rgba(0,0,0,0.2)",
                        transform: "translatex(-20px)",
                    },
                    "100%": {
                        shadow: "0 5px 15px 0px rgba(0,0,0,0.6)",
                        transform: "translatex(0px)",
                    },
                },
            },
            animation: {
                floatY: "floatY 3s ease-in-out infinite",
                floatX: "floatX 3s ease-in-out infinite",
            },
        },
    },

    plugins: [require("@tailwindcss/forms"), require("flowbite/plugin")],
};
