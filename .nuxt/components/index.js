export { default as Logo } from '../../nuxt/components/Logo.vue'

export const LazyLogo = import('../../nuxt/components/Logo.vue' /* webpackChunkName: "components/Logo" */).then(c => c.default || c)
