<template>
    <div class="container">
        <h3 class="text-center">{{ bemvinda }} usuários cadastrados</h3>
        <div class="row q-pa-md justify-center">
            <q-markup-table class="table table-bordered" width="80%">
                <thead class="text-center">
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
                        <th>img</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="(cliente, index) in paginator.data"
                        :key="cliente.id"
                    >
                        <td>{{ cliente.id }}</td>
                        <td>
                            <router-link
                                class="text-primary"
                                :to="`/clientes/exibir/${cliente.id}`"
                                >{{ cliente.nome }}</router-link
                            >
                        </td>
                        <td>{{ cliente.sobrenome }}</td>
                        <td>{{ cliente.email }}</td>
                        <td>{{ cliente.idade }}</td>
                        <td>{{ cliente.telefone }}</td>
                        <td>{{ cliente.cidade }}</td>
                        <td>{{ cliente.bairro }}</td>
                        <td>{{ cliente.uf }}</td>
                        <td>
                            <img
                                width="20"
                                height="20"
                                :src="`${cliente.image}`"
                            />
                        </td>

                        <td>
                            <div class="btn-group" role="group">
                                <q-btn
                                size="md"
                                    color="primary"
                                    stretch
                                    flat
                                    :to="`/editar/cliente/${cliente.id}`"
                                    icon="editar"
                                />
                                <q-btn
                                size="md"
                                    icon="delete"
                                    stretch
                                    flat
                                    @click="deleteCliente(cliente.id, index)"
                                />
                            </div>
                        </td>
                    </tr>
                </tbody>
            </q-markup-table>
        </div>
        <div class="row q-pa-lg-none"></div>
        <div class="row justify-center">
            <q-pagination
                v-if="paginator.total > 0"
                @update:model-value="goToPage"
                :max="paginator.last_page"
                v-model="paginator.current_page"
                direction-links
            />
        </div>
    </div>
</template>

<script>
import { onMounted, ref, computed } from "vue";
import axios from "axios";
import { useRouter, useRoute } from "vue-router";
import { useQuasar } from "quasar";

export default {
    name: "AllClients",
    setup() {
        const paginator = ref({});
        const router = useRouter();
        const route = useRoute();
        const $q = useQuasar();
        const getClientes = async () => {
            const { data } = await axios.get("/api/clientes");
            paginator.value = data;
        };
        onMounted(() => {
            console.log($q.localStorage.getItem('token'))
            console.warn($q.localStorage.getItem('name'))
            getClientes();
        });

        const bemvinda = computed(() =>{
            let nome = $q.localStorage.getItem('name')
            return $q.localStorage.has('name') ? `Bem-vindo(a) ${nome} ` : ''
        })
        async function deleteCliente(id, index) {
            const resp = await axios.post(`/api/clientes/${id}`, {
                _method: "DELETE",
            });

            $q.notify({ color: "positive", message: resp.data.message });
            paginator.value.data.splice(index, 1);
        }

        async function goToPage(page) {
            const { data } = await axios.get(`/api/clientes?page=${page}`);
            paginator.value = data;
        }

        return {
            paginator,
            deleteCliente,
            goToPage,
            bemvinda
        };
    },
};
</script>
