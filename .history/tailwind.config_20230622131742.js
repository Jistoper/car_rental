/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    theme: {
      extend: {
        colors: {
          'culti-green': '#889E81',
          'culti-green-2': '#b0c6a9',
          'culti-green-3': '#054141',
          'culti-green-4': '#235f5f',
          'culti-green-5': '#5f9b9b',
          'color-1': '#f8f7f6',
        },
      },
    },
    variants: {
      extend: {
        textColor: ['hover'],
      },
    },
    plugins: [],
  }
    