/** @type {import('tailwindcss').Config} */
export default {
  content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
        colors: {
            'header-yellow': '#F6AE2D'
        },
    },
  },
    plugins: [
        require('flowbite/plugin')
    ]
}

