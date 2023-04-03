import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import axios from 'axios'
import './assets/main.css'
import { createPinia } from 'pinia'
// import { markRaw } from 'vue'

// router = markRaw(router);

axios.defaults.withCredentials =true
axios.defaults.baseURL = 'http://localhost:8000'

const pinia = createPinia()
const app = createApp(App)

app.use(router)
app.use(pinia)

app.mount('#app')
