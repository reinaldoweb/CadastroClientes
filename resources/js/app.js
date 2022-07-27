import './bootstrap';
import { Quasar } from 'quasar'
import '@quasar/extras/material-icons/material-icons.css'
import 'quasar/src/css/index.sass'
import { createWebHistory, createRouter } from "vue-router";
import routes from './routes.js'
import {createApp} from 'vue'

const router = createRouter({
    history: createWebHistory(),
    routes,
});

import App from './App.vue'

const appTeste = createApp(App)

appTeste.use(Quasar, {
    plugins: {}, // import Quasar plugins and add here
})

appTeste.use(router)

appTeste.mount("#app")
