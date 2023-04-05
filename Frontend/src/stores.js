import { defineStore } from "pinia";
import axios from "axios";

export const useAuthStore = defineStore("auth", {
    state: () => ({
        authUser: JSON.parse(localStorage.getItem('authUser')) || null,
    }),
    getters: {
        user: (state) => state.authUser

    },
    actions: {
        async getToken() {
            await axios.get('/sanctum/csrf-cookie')
        },
        async getUser() {
            // this.getToken()
            console.log(this.authUser);
            try {
                const response = await axios.get('/api/user')
                this.authUser = response.data
                localStorage.setItem('authUser', JSON.stringify(this.authUser));
            } catch (error) {
                console.log(error.response)
            }
        },
        async login({email,password}) {
           await this.getToken()
            try {
                await axios.post('/login', {
                    email: email,
                    password: password
                })
                await this.getUser()
                localStorage.setItem('authUser', JSON.stringify(this.authUser));
                this.router.push('/')
            } catch (error) {
                console.log(error.data)
            }
        },
        async register(name,email,password,password_confirmation) {
            this.getToken()
            try {
                await axios.post('/', {
                    name: name,
                    email: email,
                    password: password,
                    password_confirmation: password_confirmation,
                })
                await this.getUser()
                localStorage.setItem('authUser', JSON.stringify(this.authUser));
                this.router.push('/')
            } catch (error) {
                console.log(error.data)
            }
        },
        async updateProfile(data) {
            try {
                await axios.patch('/api/profile', data)
                // update stored user values 
                delete data.password
                for (const key in data) {
                    this.authUser[key] = data[key]
                }
            } catch (error) {
                console.log(error.data)
            }
        },
        async logout() {
            this.getToken()
            try {
                await axios.post('/logout')
                this.authUser = null
                localStorage.removeItem('authUser');
                this.router.push('/')
            } catch (error) {
                console.log(error.response)
            }
        }
    }
})