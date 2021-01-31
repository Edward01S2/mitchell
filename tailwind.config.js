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
          150: '#1847F7',
          200: '#0065F2',
          300: '#07202D',
        },
        'c-gray': {
          50: '#F1F1F1',
          100: '#F3F5F8',
          200: '#939598',
        }
      },
      spacing: {
        108: '28rem',
      },
      fontFamily: {
        'whyte' : ['Whyte', 'sans-serif'],
        'antiza' : ['Antiza', 'serif'],
      },
      boxShadow: {
        article: '0 10px 50px 0 rgba(0, 0, 0, 0.08)',
      },
      maxWidth: {
        'md/2' : '384px',
        'lg/2' : '512px',
        'xl/2' : '640px',
      }
    },
  },
  variants: {
    borderWidth: ({after}) => after(['group-hover']),
    borderColor: ({after}) => after(['group-hover']),
    extend: {},
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('@tailwindcss/aspect-ratio'),
  ],
  
};
