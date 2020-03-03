import Vue from 'vue'
import Vuetify from 'vuetify/lib'
import colors from 'vuetify/es5/util/colors'
import Vuelidate from 'vuelidate'
import VueCookies from 'vue-cookies'
Vue.use(VueCookies)
Vue.use(Vuelidate)

Vue.use(Vuetify, {
    theme: {
        primary: '#323E48',
        accent: '#72635A',
        secondary: '#B94842',
        info: colors.teal.lighten1,
        warning: colors.amber.base,
        error: colors.deepOrange.accent4,
        success: colors.green.accent4
    }
})