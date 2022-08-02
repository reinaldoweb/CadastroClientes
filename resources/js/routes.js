import AllClients from './components/AllClients.vue';
import AddClient from './components/AddClient.vue';
import ShowOneCliente from './components/ShowOneCliente.vue';
import Home from './pages/Home.vue'
import Contato from './pages/Contato.vue'

 const routes = [
    {
        name: 'home',
        path:'/',
        component: Home
    },
    {
        name: 'listarClientes',
        path:'/listar/clientes',
        component: AllClients
    },
    {
        name: 'addClientes',
        path: '/adicionar/cliente',
        component: AddClient
    },
    {
        name: 'editClientes',
        path: '/editar/cliente/:id',
        component: AddClient
    },
    {
        name: 'showOneCliente',
        path: '/clientes/exibir/:id',
        component: ShowOneCliente
    },
    {
        name: 'contato',
        path: '/cliente/contato',
        component: Contato
        }

];


export default routes
