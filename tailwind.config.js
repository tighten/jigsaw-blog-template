const { colors } = require('tailwindcss/defaultTheme')

module.exports = {
  theme: {
    extend: {
      colors: {
        gray: {
          ...colors.gray,
          '100': '#f9f9f9',
          '200': '#ecf0f3',
          '400': '#e2e8ee',
          '800': '#3e4852',
          '900': '#1f2e41'
        },
        blue: {
          ...colors.blue,
          '100': '#eff8ff',
          '200': '#bcdefa',
          '400': '#6cb2eb',
          '500': '#3490dc',
          '600': '#0174d4',
          '800': '#1a4d8c',
          '900': '#24548f'
        }
      },
      fontFamily: {
        sans: [
          'Nunito Sans'
        ]
      },
      lineHeight: {
        normal: '1.6',
        loose: '1.75',
      },
      maxWidth: {
        none: 'none',
        '7xl': '80rem',
        '8xl': '88rem'
      },
      spacing: {
        '7': '1.75rem',
        '9': '2.25rem'
      },
      boxShadow: {
        'lg': '0 -1px 27px 0 rgba(0, 0, 0, 0.04), 0 4px 15px 0 rgba(0, 0, 0, 0.08)',
      }
    },
    fontSize: {
      'xs': '.8rem',
      'sm': '.925rem',
      'base': '1rem',
      'lg': '1.125rem',
      'xl': '1.25rem',
      '2xl': '1.5rem',
      '3xl': '1.75rem',
      '4xl': '2.125rem',
      '5xl': '2.625rem',
      '6xl': '10rem',
    },
    lineHeight: {
      normal: '1.6',
      loose: '1.75',
    },
  },
  variants: {
    borderRadius: ['responsive', 'focus'],
    borderWidth: ['responsive', 'active', 'focus'],
    width: ['responsive', 'focus']
  },
  plugins: [
    function({ addUtilities }) {
      const newUtilities = {
        '.transition-fast': {
          transition: 'all .2s ease-out',
        },
        '.transition': {
          transition: 'all .5s ease-out',
        },
      }
      addUtilities(newUtilities)
    }
  ]
}
