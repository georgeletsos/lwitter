const { colors, fontFamily } = require("tailwindcss/defaultTheme");

module.exports = {
    purge: [],
    theme: {
        boxShadow: {
            outline: '0 0 0 2px rgb(142, 208, 249)',
        },
        extend: {
            colors: {
                mirage: {
                    100: '#E8E9EA',
                    200: '#C5C7CA',
                    300: '#A1A6AA',
                    400: '#5B636B',
                    500: '#15202B',
                    600: '#131D27',
                    700: '#0D131A',
                    800: '#090E13',
                    900: '#060A0D',
                },
            },
            scale: {
                'neg-1': '-1'
            },
            margin: {
                14: '3.5rem'
            },
            padding: {
                13: '3.25rem'
            },
            fontFamily: {
                sans: ["Montserrat", ...fontFamily.sans]
            }
        },
    },
    variants: {
        backgroundColor: ['responsive', 'hover', 'focus', 'group-hover'],
        backgroundOpacity: ['responsive', 'hover', 'focus', 'group-hover'],
        borderColor: ['responsive', 'hover', 'focus', 'focus-within'],
        textColor: ['responsive', 'hover', 'focus', 'group-hover', 'focus-within'],
        textDecoration: ['responsive', 'hover', 'focus', 'group-hover']
    },
    plugins: [],
}
