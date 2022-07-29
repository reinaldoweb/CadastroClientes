<template>
    <div class="container">
        <h3 class="text-center">Cadastrados</h3>
        <div class="row q-pa-xl">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Sobre Nome</th>
                        <th>E-mail</th>
                        <th>Idade</th>
                        <th>Telefone</th>
                        <th>Cidade</th>
                        <th>Bairro</th>
                        <th>Uf</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="cliente in paginator.data" :key="cliente.id">
                        <td>{{ cliente.id }}</td>
                        <td>{{ cliente.nome }}</td>
                        <td>{{ cliente.sobrenome }}</td>
                        <td>{{ cliente.email }}</td>
                        <td>{{ cliente.idade }}</td>
                        <td>{{ cliente.telefone }}</td>
                        <td>{{ cliente.cidade }}</td>
                        <td>{{ cliente.bairro }}</td>
                        <td>{{ cliente.uf }}</td>

                        <td>
                            <div class="btn-group" role="group">
                                <q-btn
                                    size="md"
                                    color="primary"
                                    stretch
                                    flat
                                    label="editar"
                                    :to="`/editar/cliente/${cliente.id}`"
                                />
                                <q-btn
                                    size="md"
                                    color="negative"
                                    stretch
                                    flat
                                    label="apagar"
                                    @click="deleteCliente(cliente.id)"
                                />
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import { onMounted, ref } from "vue";
import axios from "axios";
import { useRouter, useRoute } from "vue-router";

export default {
    name: "AllClients",
    setup() {
        const paginator = ref({});
        const router = useRouter();
        const route = useRoute();

        const getClientes = async () => {
            const { data } = await axios.get("/api/clientes");
            paginator.value = data;
            console.log(paginator.value);
        };
        onMounted(() => {
            getClientes();
        });

        async function deleteCliente(id) {
            const resp = await axios.post(`/api/clientes/${id}`, {
                _method: "DELETE",
            });
            if (resp.status === 200) {
                router.push({ path: "/listar/clientes" });
            }
        }

        return {
            paginator,
            deleteCliente,
        };
    },
};
</script>
