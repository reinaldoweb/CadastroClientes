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
                    <tr v-for="(cliente, index) in paginator.data" :key="cliente.id">
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
                                    @click="deleteCliente(cliente.id, index)"
                                />
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <q-pagination
                v-if="paginator.total > 0"
                @update:model-value="goToPage"
                :max="paginator.last_page"
                v-model="paginator.current_page"
                direction-links />
        </div>
    </div>
</template>

<script>
import { onMounted, ref } from "vue";
import axios from "axios";
import { useRouter, useRoute } from "vue-router";
import { useQuasar } from 'quasar';

export default {
    name: "AllClients",
    setup() {
        const paginator = ref({});
        const router = useRouter();
        const route = useRoute();
        const $q = useQuasar()
        const getClientes = async () => {
            const { data } = await axios.get("/api/clientes");
            paginator.value = data;
        };
        onMounted(() => {
            getClientes();
        });

        async function deleteCliente(id, index) {
            const resp = await axios.post(`/api/clientes/${id}`, {
                _method: "DELETE",
            });

            $q.notify({color: 'positive', message: resp.data.message})
            paginator.value.data.splice(index, 1)
        }

        async function goToPage(page) {
            const { data } = await axios.get(`/api/clientes?page=${page}`)
            paginator.value = data
        }

        return {
            paginator,
            deleteCliente,
            goToPage
        };
    },
};
</script>
