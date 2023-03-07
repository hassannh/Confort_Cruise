import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import AboutView from '../views/AboutView.vue'
import Reservation from '../views/Reservation.vue'
import LoginView from '../views/LoginView.vue'
import DashboardVue from '../views/DashboardVue.vue'
import PortsView from '../views/PortsView.vue'
import RegisterView from '../views/RegisterView.vue'


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/about',
      name: 'about',
      component: AboutView
    },
    {
      path: '/login',
      name: 'login',
      component: LoginView
    },
    {
      path: '/register',
      name: 'register',
      component: RegisterView
    },
    {
      path: '/dashboard',
      name: 'dashboard',
      component: DashboardVue
    },
    {
      path: '/ports',
      name: 'ports',
      component: PortsView
    },
    {
      path: '/reservation',
      name: 'reservation',
      component: Reservation
    }
  ]
})

export default router
