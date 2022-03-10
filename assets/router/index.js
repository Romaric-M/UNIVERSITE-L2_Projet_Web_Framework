import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import VoirRecette from "../views/VoirRecette";
import Recettes from "../views/Recettes";

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/voir_recette/:id',
    name: 'VoirRecette',
    component: VoirRecette
  },
  {
    path: '/recettes',
    name: 'Recettes',
    component: Recettes
  }
]

const router = new VueRouter({
  routes
})

export default router
