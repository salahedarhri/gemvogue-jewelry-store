import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */

export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                serif:['Playfair Display',
                ...defaultTheme.fontFamily.serif],
                sans: ['DM Sans',
                 ...defaultTheme.fontFamily.sans],

            },
        },
    },

    plugins: [
        require("daisyui"),
        forms],

    daisyui: {
        themes: ["light", "dark", "autumn","garden"],
        },
};
