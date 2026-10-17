const colors = [
    'background',
    'error',
    'on-background',
    'on-surface',
    'on-surface-variant',
    'outline',
    'outline-variant',
    'primary',
    'primary-container',
    'secondary',
    'secondary-container',
    'secondary-fixed',
    'surface',
    'surface-container',
    'surface-container-high',
    'surface-container-low',
    'surface-container-lowest',
    'surface-variant',
    'tertiary',
];

module.exports = {
    content: [
        './resources/js/components/auth/Login.vue',
        './resources/js/components/auth/Register.vue',
    ],
    prefix: 'auth-',
    corePlugins: {
        preflight: false,
    },
    theme: {
        extend: {
            colors: {
                ...Object.fromEntries(
                    colors.map((color) => [
                        color,
                        `rgb(var(--mv-c-${color}) / <alpha-value>)`,
                    ]),
                ),
                'white-container': '#ffffff',
            },
            fontFamily: {
                'body-md': ['Plus Jakarta Sans', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                'body-sm': ['Plus Jakarta Sans', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                'headline-md': ['Plus Jakarta Sans', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                'headline-sm': ['Plus Jakarta Sans', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                'headline-lg': ['Plus Jakarta Sans', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                'headline-lg-mobile': ['Plus Jakarta Sans', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                'headline-xl': ['Plus Jakarta Sans', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                'headline-xl-mobile': ['Plus Jakarta Sans', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                'label-sm': ['Plus Jakarta Sans', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                'label-md': ['Plus Jakarta Sans', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                'label-lg': ['Plus Jakarta Sans', 'ui-sans-serif', 'system-ui', 'sans-serif'],
            },
            fontSize: {
                'body-md': ['14px', { lineHeight: '22px' }],
                'body-sm': ['12px', { lineHeight: '18px' }],
                'headline-md': ['24px', { lineHeight: '32px' }],
                'headline-sm': ['20px', { lineHeight: '28px' }],
                'headline-lg': ['32px', { lineHeight: '40px' }],
                'headline-lg-mobile': ['24px', { lineHeight: '32px' }],
                'headline-xl': ['48px', { lineHeight: '56px' }],
                'headline-xl-mobile': ['32px', { lineHeight: '40px' }],
                'label-sm': ['10px', { lineHeight: '14px' }],
                'label-md': ['12px', { lineHeight: '16px' }],
                'label-lg': ['14px', { lineHeight: '20px' }],
            },
            spacing: {
                'space-md': '1rem',
                'space-lg': '1.5rem',
                'space-sm': '0.5rem',
            },
        },
    },
};
