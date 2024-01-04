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
                playfair:['Playfair Display'],
                dmsans: ['DM Sans'],
                roboto:['Roboto'],
                martel:['Martel'],

            },
            colors:{
                lighterBeige:'#E5D8D3',
                Beige:'#EAD8CE',
                whiteBeige:'#F2E1D9',
                darkerBeige:'#DDC0B0',

                lightShade:'#E5D8D3',
                mediumShade:'#EAD8CE',
                whiteShade:'#F2E1D9',
                darkShade:'#DDC0B0',
                
                //Theme
                first:'#1B1B1B',
                second:'#AB724F',
                secondDarker:'#93533B',
                third:'#EAD8CE',
            }
        },
    },

    plugins: [
        require("daisyui"), forms],

    daisyui: {
        themes: ["light", "dark", "autumn","garden","cyberpunk"],
        },
};
