import colors from 'vuetify/es5/util/colors'
const env = require('dotenv').config()

export default {
  mode: 'spa',
  env: env.parsed,
  /*
  ** Headers of the page
  */
  head: {
    /* titleTemplate: '%s' + process.env.npm_package_name,
    title: process.env.npm_package_name || '', */
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: process.env.npm_package_description || '' }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' },
      {
        rel: 'stylesheet',
        href:
          'https://fonts.googleapis.com/css?family=Bree+Serif&display=swap'
      }
    ],
    script: [
      {
        src: "https://kit.fontawesome.com/e8c27a6e8e.js"
      }
    ]
  },
  /*
  ** Customize the progress-bar color
  */
  loading: { color: '#1F3750' },
  /*
  ** Global CSS
  */
  css: [
    '~/assets/css/main.css',
  ],
  /*
  ** Plugins to load before mounting the App
  */
  plugins: [
    '~/plugins/i18n.js',
    /* { src: '~/plugins/vue-apexchart.js', ssr: false }, */
  ],
  /*
  ** Nuxt.js dev-modules
  */
  buildModules: [
  /* '@nuxtjs/vuetify', */
    ['@nuxtjs/vuetify', {}]
  ],
  /*
  ** Nuxt.js modules
  */
  modules: [
    // Doc: https://axios.nuxtjs.org/usage
    '@nuxtjs/axios',
    '@nuxtjs/pwa',
    // Doc: https://github.com/nuxt-community/dotenv-module
    '@nuxtjs/dotenv',
  ],
  /*
  ** Axios module configuration
  ** See https://axios.nuxtjs.org/options
  */
  axios: {
    // baseURL: 'http://api.wiltondev.site/public/api/backoffice'
    baseURL: process.env.BASE_URL
  },
  /*
  ** vuetify module configuration
  ** https://github.com/nuxt-community/vuetify-module
  */
  vuetify: {
    customVariables: ['~/assets/variables.scss'],
    optionsPath: "./vuetify.options.js"
  },
  /*
  ** Build configuration
  */
  build: {
    /*
    ** You can extend webpack config here
    */
    extend (config, ctx) {
    }
  }
}
