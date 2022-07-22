import './bootstrap';
import { Quasar } from 'quasar'
import '@quasar/extras/material-icons/material-icons.css'
import 'quasar/src/css/index.sass'

import {createApp} from 'vue'

import App from './App.vue'

const appTeste = createApp(App)

appTeste.use(Quasar, {
    plugins: {}, // import Quasar plugins and add here
})

appTeste.mount("#app")
