import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import AboutView from '../views/AboutView.vue'
import Reservation from '../views/Reservation.vue'
import LoginView from '../views/LoginView.vue'
import DashboardVue from '../views/DashboardVue.vue'
import PortsView from '../views/PortsView.vue'
import shipAdmin from '../views/shipAdmin.vue'
import companyAdmin from '../views/companyAdmin.vue'
import BookingView from '../views/BookingView.vue'
import RegisterView from '../views/RegisterView.vue'
import AddCruise from '../components/AddCruise.vue'
import Tickets from '../components/Tickets.vue'


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
      path: '/tickets',
      name: 'tickets',
      component: Tickets
    },
    {
      path: '/add_cruise',
      name: 'add_cruise',
      component: AddCruise
    },
    {
      path: '/booking',
      name: 'BookingView',
      component: BookingView
    },
    {
      path: '/ports',
      name: 'ports',
      component: PortsView
    },

    {
      path: '/ships',
      name: 'ships',
      component: shipAdmin
    },
    {
      path: '/companies',
      name: 'companies',
      component: companyAdmin
    },
    {
      path: '/reservation',
      name: 'reservation',
      component: Reservation
    }
  ]
})

export default router
