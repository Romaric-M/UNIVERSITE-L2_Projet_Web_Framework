import Vue from 'vue'
import Header from './views/Header.vue'
import router from './router'
import store from './store'

Vue.config.productionTip = false

new Vue({
    router,
    store,
    render: h => h(Header)
}).$mount('#header')