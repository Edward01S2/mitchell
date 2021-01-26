module.exports = {
  purge: {
    content: [
      './**/*.php',
      './resources/**/*.vue',
      './resources/**/*.js',
      './resources/**/*.json',
    ],
    options: {
      safelist: {
        greedy: '/wp-embed-responsive',
      }
    },
  },
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        'c-blue': {
          50: '#D1E2ED',
          100: '#6DA4F0',
          200: '#0065F2',
          300: '#07202D',
        },
        'c-gray': {
          50: '#F1F1F1',
          100: '#F3F5F8',
          200: '#939598',
        }
      },
      fontFamily: {
        'whyte' : ['Whyte', 'sans-serif'],
        'antiza' : ['Antiza', 'serif'],
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('@tailwindcss/aspect-ratio'),
  ],
  
};
