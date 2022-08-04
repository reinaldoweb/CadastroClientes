<template>
    <div class="container">
        <div class="row q-pa-md">
            <table>
                <tr>
                    <td>Nome:</td>
                    <td> {{cliente.nome }} {{ cliente.sobrenome}}</td>

                    <td>
                        <q-avatar rounded>
                            <img width="50" height="50" :src="cliente.image" />
                        </q-avatar>
                    </td>
                </tr>
                <tr>
                    <td>Bairro:</td>
                    <td>{{ cliente.bairro }}</td>
                </tr>
                <tr>
                    <td>Cidade:</td>
                    <td>{{ cliente.cidade }}</td>
                </tr>
                <tr>
                    <td>Endereço:</td>
                    <td>{{ cliente.endereco }}</td>
                </tr>
                <tr>
                    <td>Idade:</td>
                    <td>{{ cliente.idade }}</td>
                </tr>
            </table>
        </div>
    </div>
</template>
<script>
import { defineComponent, onMounted, ref } from "vue";
import axios from "axios";
import { useRoute } from "vue-router";
export default defineComponent({
    setup() {
        const cliente = ref({
            image: "",
        });
        const route = useRoute();
        onMounted(() => {
            getCliente();
        });

        async function getCliente() {
            const { data } = await axios.get(
                `/api/clientes/${route.params.id}`
            );
            cliente.value = data;
        }

        return {
            cliente,
        };
    },
});
</script>
