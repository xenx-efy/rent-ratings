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
        blue: {
          400: '#5786FF',
          950: '#252D4F',
        },
        slate: {
          200: '#D8E5FF',
          300: '#B8D0FF',
        },
        gray: {
          200: '#E3E3E3',
          300: '#CACACA',
          400: '#A9A9A9',
        },
        yellow: {
          400: '#FFD80F',
        },
        red: {
          600: '#DC362E',
        },
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
      },
      boxShadow: { custom: '0px 4px 6px 0px #00000040' },
    },
  },

  plugins: [forms],
};
