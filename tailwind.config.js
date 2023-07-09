/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      gridTemplateColumns: {
        '3': 'repeat(3, minmax(0, 1fr))',
      },
    },
  },
  plugins: [],
}