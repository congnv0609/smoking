require('../js/bootstrap');

import 'core-js/stable'
import Vue from 'vue'
import App from './App'
import router from './router'
import CoreuiVue from '@coreui/vue'
import { iconsSet as icons } from './assets/icons/icons.js'
import store from './store'
import { initialize } from "./helpers/general"
import VueMoment from 'vue-moment';
import VueMeta from 'vue-meta'

initialize(store, router)

Vue.config.performance = true
Vue.use(CoreuiVue)
Vue.prototype.$log = console.log.bind(console)
Vue.use(VueMoment)
Vue.use(VueMeta)

new Vue({
  el: '#app',
  router,
  store,
  icons,
  template: '<App/>',
  components: {
    App,
  }
})
