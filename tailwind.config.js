const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  theme: {
    extend: { 
      colors: {
        'transparent': 'transparent',
        'black': '#22292f',
        'white': '#ffffff',
        'grey': '#b8c2cc',
        'grey-light': '#dae1e7',
          'light-blue': {
            100: '#E7F4FC',
            200: '#C2E5F8',
            300: '#9ED5F3',
            400: '#55B5EB',
            500: '#0C95E2',
            600: '#0B86CB',
            700: '#075988',
            800: '#054366',
            900: '#042D44',
            },
        },
        screens: {
          xs: '320px',
        },
        fontFamily: {
          sans: ['Inter var', ...defaultTheme.fontFamily.sans],
        },
        width: {
          '72': '18rem',
          '80': '20rem',
          '88': '22rem',
          '96': '24rem',
        },

        height: {
          video: '36rem',
        },

      /*
      |-----------------------------------------------------------------------------
      | Minimum width                        https://tailwindcss.com/docs/min-width
      |-----------------------------------------------------------------------------
      |
      | Here is where you define your minimum width utility sizes. These can
      | be percentage based, pixels, rems, or any other units. We provide a
      | couple common use-cases by default. You can, of course, modify
      | these values as needed.
      |
      | Class name: .min-w-{size}
      |
      */

      minWidth: {
        '0': '0',
        '18': '18rem',
        '20': '20rem',
        '22': '22rem',
        '24': '24rem',
        '26': '26rem',
        'xs': '28rem',
        'sm': '30rem',
        'md': '40rem',
        'lg': '50rem',
        'xl': '60rem',
        '2xl': '70rem',
        '3xl': '80rem',
        '4xl': '90rem',
        '5xl': '100rem',
        'full': '100%',
        'full': '100%',
      },
       /*
      |-----------------------------------------------------------------------------
      | Maximum width                        https://tailwindcss.com/docs/max-width
      |-----------------------------------------------------------------------------
      |
      | Here is where you define your maximum width utility sizes. These can
      | be percentage based, pixels, rems, or any other units. By default
      | we provide a sensible rem based scale and a "full width" size,
      | which is basically a reset utility. You can, of course,
      | modify these values as needed.
      |
      | Class name: .max-w-{size}
      |
      */

      maxWidth: {
        '8xl': '90rem',
        '9xl': '100rem',
      },

    },
  },
  variants: {
    
  },
  plugins: [
    require('@tailwindcss/ui')({
      layout: 'sidebar',
    })
  ],
}
