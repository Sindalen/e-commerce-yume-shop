import defaultTheme from 'tailwindcss/defaultTheme';
import "tailwindcss";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            
        fontFamily: {
            'noto-sans-khmer': ['Noto Sans Khmer', 'sans-serif'],
        },
        colors: {
            logo_color: "#083975",
            pink: "#ed008c",
            white: "#ffffff",
            gray: "#4d5765",
            gray_200: "#e8e8e8",
            gray_400: "#a3a3a3 ",
            blue: "#2044b0",
            yellow: "#fed702",
            orange: "#f07d00",
            purple: "#8c52ff",
            black: "#000000",
            sky: "#009dc4",
            green: "#009d3d ",
            lemon_yellow: "#c1c600",
            red: "#e93131",
            bg_choice:"#e9effb",
        },
        backgroundColor: {
            bg_color: "#eff6ff",
            white: "#ffffff",
        },
        screens: {
            sm375: '375px',
            sm425: '425px',
            sm573: '573px',
            sm767: '767px',
            sm879: '879px',
            lgm: '1025px',
            lgmd: '1100px',
            lg: '1200px',
            lglg: '1300px',
            lgl: '2000px',
        },
        },
    },
    safelist: [
        'text-logo_color',
        'fill-logo_color',
        'text-pink',
        'bg-logo_color',
        'bg-pink',
        'bg-gray',
        'bg-blue',
        'bg-yellow',
        'bg-orange',
        'bg-purple',
        'bg-green',
        'bg-black',
        'hover:bg-logo_color', // Add hover state
        'hover:bg-pink',
        'hover:bg-gray',
        'hover:bg-blue',
        'hover:bg-yellow',
        'hover:bg-orange',
        'hover:bg-purple',
        'hover:bg-green',
        'hover:bg-black',
        'bg-gray-400',
        'bg-choice',



    ],
    plugins: [
        require('tailwind-scrollbar-hide')
    ],

};
