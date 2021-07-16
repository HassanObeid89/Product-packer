module.exports = {

  purge: [
    './resources/views/**/*.blade.php'
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {},
  },
  variants: {
    extend: {
      animation: ['motion-safe'],
      
    },
  },
  plugins: [],
}
