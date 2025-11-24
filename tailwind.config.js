/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./resources/views/frontend/**/*.blade.php",
    "./resources/views/frontend/partials/**/*.blade.php",
    "./resources/views/frontend/sections/**/*.blade.php",
  ],
  theme: {
    extend: {
      fontFamily: {
        // Nama Font
        'Primary': ['DM Serif Display', 'serif'],
        'Secondary': ['Montserrat', 'sans-serif'], 
        'Tertiary': ['Kaushan Script', 'cursive'],
      },
      colors: {
        'primary': '#35414f', 
        'primary-hover': '#35414f', 
        'accent': '#cda274', 
        'accent-hover': '#b88c5d',
      }
    },
  },
  plugins: [],
}

