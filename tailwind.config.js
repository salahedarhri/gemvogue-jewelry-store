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
            spacing:{
                'largeHeight':'32rem',
            },
            fontFamily: {
                
                serif:['Playfair Display'],
                sans: ['DM Sans'],
                tables:['Roboto'],

            },
            colors:{
                lighterBeige:'#E5D8D3',
                Beige:'#EAD8CE',
                whiteBeige:'#F2E1D9',
                darkerBeige:'#DDC0B0',

                //Theme
                darkShade:'#4D4D4D',
                mediumShade:'#B46060',
                lightShade:'#FFBF9B',
                whiteShade:'#FFF4E0',
            }
        },
    },

    plugins: [
        require("daisyui"), forms],

    daisyui: {
        themes: ["light", "dark", "autumn","garden","cyberpunk"],
        },
};
