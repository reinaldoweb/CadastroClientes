<template>
    <div class="container">



        <h3 class="text-center">Clientes Cadastrados</h3>

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
                                size="xs"
                                color="primary"
                                stretch
                                flat
                                label="editar"
                                :to="`/editar/cliente/${cliente.id}`"
                            />
                            <q-btn
                                size="xs"
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
</template>

<script>
import { onMounted, ref } from "vue";
import axios from "axios";
export default {
    name: "AllClients",
    setup() {
        const paginator = ref({});

        const getClientes = async () => {
            const { data } = await axios.get("/api/clientes");
            paginator.value = data;
            console.log(paginator.value);
        };
        onMounted(() => {
            getClientes();
        });

        async function deleteCliente(id) {
            const resp = await axios.delete(`/api/clientes/${id}`);
            if (resp.status) {
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
