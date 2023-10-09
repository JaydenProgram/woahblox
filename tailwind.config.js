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
        }
    },
  },
  plugins: [],
}

