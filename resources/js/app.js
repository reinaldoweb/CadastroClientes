import './bootstrap';
import { Quasar } from 'quasar'
import '@quasar/extras/material-icons/material-icons.css'
import 'quasar/src/css/index.sass'
import axios from 'axios';

import {createApp} from 'vue'

import App from './App.vue'
// import App from '../views/layouts/app'

const appTeste = createApp(App)

appTeste.use(Quasar, {
    plugins: {}, // import Quasar plugins and add here
})

appTeste.mount("#app")
