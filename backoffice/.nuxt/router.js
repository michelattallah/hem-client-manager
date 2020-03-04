import Vue from 'vue'
import Router from 'vue-router'
import { interopDefault } from './utils'
import scrollBehavior from './router.scrollBehavior.js'

const _214a4249 = () => interopDefault(import('..\\pages\\clients\\index.vue' /* webpackChunkName: "pages_clients_index" */))
const _de1c0a28 = () => interopDefault(import('..\\pages\\employees\\index.vue' /* webpackChunkName: "pages_employees_index" */))
const _0e33ac23 = () => interopDefault(import('..\\pages\\index.vue' /* webpackChunkName: "pages_index" */))

// TODO: remove in Nuxt 3
const emptyFn = () => {}
const originalPush = Router.prototype.push
Router.prototype.push = function push (location, onComplete = emptyFn, onAbort) {
  return originalPush.call(this, location, onComplete, onAbort)
}

Vue.use(Router)

export const routerOptions = {
  mode: 'history',
  base: decodeURI('/'),
  linkActiveClass: 'nuxt-link-active',
  linkExactActiveClass: 'nuxt-link-exact-active',
  scrollBehavior,

  routes: [{
    path: "/clients",
    component: _214a4249,
    name: "clients"
  }, {
    path: "/employees",
    component: _de1c0a28,
    name: "employees"
  }, {
    path: "/",
    component: _0e33ac23,
    name: "index"
  }],

  fallback: false
}

export function createRouter () {
  return new Router(routerOptions)
}
