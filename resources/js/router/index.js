import Login from '../components/Login.vue'
import Booking from '../components/Booking.vue'
import { createRouter, createWebHistory } from 'vue-router'

const routes = [
    {
        path: '/',
        name: 'Login',
        component: Login,
    },
    {
        path: '/booking/:token?', //pass param
        name: 'Booking',
        component: Booking,
        props: true // Enable passing route params as props to the component
    },
]

export default createRouter({
    history: createWebHistory(),
    routes
})
