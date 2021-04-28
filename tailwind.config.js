module.exports = {
  mode: 'jit',
  purge: {
    content: [
      './app/**/*.php',
      './resources/**/*.php',
      './resources/**/*.vue',
      './resources/**/*.js',
      './resources/**/*.scss',
    ],
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
          400: '#124159',
        },
        'c-gray': {
          25: '#CCCCCC',
          50: '#F1F1F1',
          75: '#D1D1D1',
          100: '#F3F5F8',
          200: '#939598',
          300: '#999999',
          400: '#666666',
        },
        'c-black': {
          100: '#07202D',
        },
      },
      spacing: {
        108: '28rem',
        '200%' : '200%',
        '250%' : '250%',
        '300%' : '300%',
        '400%' : '400%',
      },
      fontFamily: {
        'whyte' : ['Whyte', 'sans-serif'],
        'atiza' : ['Atiza', 'serif'],
      },
      boxShadow: {
        article: '0 10px 50px 0 rgba(0, 0, 0, 0.08)',
        issue: '0 14px 24px 0 rgba(0, 0, 0, 0.25)',
      },
      maxWidth: {
        'md/2' : '384px',
        'lg/2' : '512px',
        'xl/2' : '640px',
      },
      minHeight: {
        '20': '20rem',
        '24': '24rem',
        '30': '30rem',
        '36': '36rem',
      }
    },
  },
  variants: {
    borderWidth: ({after}) => after(['group-hover']),
    borderColor: ({after}) => after(['group-hover']),
    scale: ({after}) => after(['group-hover']),
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('@tailwindcss/aspect-ratio'),
    require('@tailwindcss/forms'),
    require('@tailwindcss/line-clamp'),
  ],
  
};
