/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['BBC Reith Sans', 'sans-serif'],
                serif: ['serif'],
                mono: ['monospace']
            },
            colors: {
                'mhoc-green': {  DEFAULT: '#006B3C',  '50': '#00B063',  '100': '#00A85E',  '200': '#009956',  '300': '#008A4D',  '400': '#007A45',  '500': '#006B3C',  '600': '#005C33',  '700': '#004C2B',  '800': '#003D22',  '900': '#002E1A'},
            }
        },
    },
    daisyui: {
        themes: [
            {
                mhocelections: {
                    "primary": "#006B3C",
                    "secondary": "#F000B8",
                    "accent": "#37CDBE",
                    "neutral": "#3D4451",
                    "base-100": "#FFFFFF",
                    "info": "#3ABFF8",
                    "success": "#36D399",
                    "warning": "#FBBD23",
                    "error": "#F87272",
                },
            },
        ],
    },
    plugins: [require("daisyui")],
}
