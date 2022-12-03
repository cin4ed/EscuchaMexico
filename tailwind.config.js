const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                secondary: ['Roboto', 'Sans'],
            },
        colors: {
            primary: {
                100: '#78928b',
                200: '#628078',
                300: '#4b6d65',
                400: '#355b51',
                500: '#1e493e',
                600: '#1b4238',
                700: '#1b4238',
                800: '#183a32',
                900: '#15332b',
            },
        },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
