/** @type {import('tailwindcss').Config} */
export default {
  content: [
    ".resources/views/layouts/dashboard.blade.php"
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}

module.exports = {

  plugins: [
      require('flowbite/plugin')
  ]

}