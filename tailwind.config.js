/** @type {import('tailwindcss').Config} */
export default {
  content: [
      './resources/**/*.blade.php',
      './resources/**/*.js',
      './resources/**/*npx .vue'
  ],
  theme: {
    extend: {
        spacing: {
            '700px': '700px',
            '640px': '640px',
            '360px': '360px',
            '1000px': '1000px',
        },
        maxWidth: {
            '640px': '640px',
        }
    },
  },
  plugins: [],
}

