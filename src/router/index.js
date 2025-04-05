import { createRouter, createWebHistory } from 'vue-router'
import HelloWorld from '../components/HelloWorld.vue'
import HelloApi from '../components/HelloApi.vue'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: HelloWorld
  },
  {
    path: '/hello',
    name: 'HelloApi',
    component: HelloApi
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router