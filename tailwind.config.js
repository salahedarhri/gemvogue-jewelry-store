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
                
                //Playfair Display is available too 
                serif:['DM Sans',
                ...defaultTheme.fontFamily.serif],
                sans: ['DM Sans',
                 ...defaultTheme.fontFamily.sans],

            },
            colors:{
                lighterBeige:'#E5D8D3',
                Beige:'#EAD8CE',
                whiteBeige:'#F2E1D9',
                darkerBeige:'#DDC0B0',
            }
        },
    },

    plugins: [
        require("daisyui"),
        forms],

    daisyui: {
        themes: ["light", "dark", "autumn","garden","cyberpunk"],
        },
};
