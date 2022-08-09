<template>
    <q-layout view="hhh lpR lFr">
        <q-header class="bg-primary text-white">
            <q-toolbar>
                <q-btn flat round dense icon="menu" class="q-mr-sm" @click="leftDrawerOpen = !leftDrawerOpen"/>

                <q-separator dark vertical inset />

                <q-btn stretch flat label="Home" to="/" />
                <q-btn
                    stretch
                    flat
                    label="Listar Clientes"
                    to="/listar/clientes"
                />
                <q-btn
                    stretch
                    flat
                    label="Adicionar Cliente"
                    to="/adicionar/cliente"
                />
                <q-btn
                    stretch
                    flat
                    label="Fale conosco"
                    to="/cliente/contato/"
                />
                <q-space />

                <q-btn stretch flat label="Login" to="/user/login" />

                <q-separator dark vertical />
                <q-btn stretch flat label="Register" to="/user/register" />

                <q-separator dark vertical />

                <q-btn stretch flat label="Sair" @click="logout"/>

            </q-toolbar>
        </q-header>

        <q-drawer v-model="leftDrawerOpen" side="left" overlay bordered>
        <!-- drawer content -->
        <a>aioaio</a>
        </q-drawer>

        <q-page-container>
            <router-view />
        </q-page-container>
    </q-layout>
</template>
<script>
import {ref} from "vue"
export default {
    name: "App",
    setup(){
        const leftDrawerOpen =ref(false)

        function logout() {
            console.log('ou')
        }
        return {
            leftDrawerOpen,
            logout
        }
    }
};
</script>
