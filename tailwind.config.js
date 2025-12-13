import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
        './resources/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                coffee: {
                    light: '#8B5A2B',   // secondary / hover light
                    DEFAULT: '#6F4E37', // primary
                    dark: '#5a3e2b',    // hover / dark shade
                },
                danger: '#dc2626',      // delete / danger buttons
            },
        },
    },

    plugins: [forms],
};
