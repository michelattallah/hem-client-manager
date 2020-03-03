import colors from "vuetify/es5/util/colors";

export default function ({ app }) {
    return {
        treeShake: true,
        lang: {
            t: (key, ...params) => app.i18n.t(key, params)
        },
        theme: {
            dark: false,
            themes: {
                dark: {
                    primary: colors.blue.darken2,
                    accent: colors.blue.base,
                    secondary: colors.amber.darken3,
                    info: colors.teal.lighten1,
                    warning: colors.amber.base,
                    error: colors.deepOrange.accent4,
                    success: colors.green.accent3
                },
                light: {
                    primary: "#2A77A6",
                    accent: "#051E34",
                    secondary: "#F0B43E",
                    font: {
                        family: 'Bree Serif'
                    },
                }
            }
        }
    }
};
