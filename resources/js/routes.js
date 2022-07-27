import AllClients from './components/AllClients.vue';
import AddClient from './components/AddClient.vue';
import EditClient from './components/EditClient.vue';
import Home from './pages/Home.vue'

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
    name: 'deletarCliente',
    path: '/deletar/cliente/:id'
    }
];


export default routes
