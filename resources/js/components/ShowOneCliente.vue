<template>
    <div>
        <h2>Nome: {{cliente.nome}}</h2>
        <p>Bairro: {{cliente.bairro}}</p>
        <p>CIdade: {{cliente.cidade}}</p>
        <p>Endereço: {{cliente.endereco}}</p>
        <p>Idade: {{cliente.idade}}</p>
        <p>SObrenome: {{cliente.sobrenome}}</p>
        <p>Image: {{ cliente.image }}</p>
        <img width="50" height="50" :src="cliente.image" />
    </div>
</template>
<script>
import { defineComponent, onMounted, ref } from 'vue'
import axios from 'axios'
import { useRoute } from 'vue-router'
export default defineComponent({
    setup() {
        const cliente = ref({
            image: ''
        })
        const route = useRoute()
        onMounted( ()=>{
            getCliente()
        })

        async function getCliente() {
            const { data }= await axios.get(`/api/clientes/${route.params.id}`)
            cliente.value = data
        }

        return {
            cliente
        }
    },
})
</script>
