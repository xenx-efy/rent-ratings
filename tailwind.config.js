import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Roboto', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'cloud-burst': '#252D4F', // text color
                'soft-blue': '#5786FF', // main color
                'periwinkle': '#B8D0FF',
                'shadow-green': '#A3BBC3',
                'titan-white': '#E6F1F9',
                'silver': '#CACACA',
                'link-water': '#D8E5FF',
            },
            fontSize: {
                sm: '0.8rem',
                base: '1rem',
                xl: '1.375rem',
                '2xl': '1.5rem',
                '3xl': '1.953rem',
                '4xl': '2.441rem',
                '5xl': '3.052rem',
            },
            borderRadius: {
                corner: '0.625rem', // 10px
            }
        },
    },

    plugins: [forms],
};
