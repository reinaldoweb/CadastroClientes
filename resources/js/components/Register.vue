<template>
    <div class="container">
        <div class="row justify-center">
            <div class="q-pa-md">
                <h4 class="">Novo usuário</h4>
                <div class="q-gutter-md" style="max-width: 1000px">
                    <q-form @submit.prevent="addUser">
                        <q-input v-model="user.name" label="Nome">
                         <template v-slot:prepend>
                                <q-icon name="person" />
                            </template>
                        </q-input>
                        <q-input v-model="user.email" label="E-mail" >
                         <template v-slot:prepend>
                                <q-icon name="mail" />
                            </template>
                        </q-input>
                        <q-input
                            v-model="user.password"
                            :type="isPwd ? 'password' : 'text'"
                            label="Password"
                        >
                            <template v-slot:append>
                                <q-icon
                                    :name="
                                        isPwd ? 'visibility_off' : 'visibility'
                                    "
                                    class="cursor-pointer"
                                    @click="isPwd = !isPwd"
                                />
                            </template>
                             <template v-slot:prepend>
                                <q-icon name="lock" />
                            </template>
                        </q-input>
                        <q-input
                            v-model="user.password_confirmation"
                            :type="isPwd ? 'password' : 'text'"
                            label="Confirm Password"
                        >
                            <template v-slot:append>
                                <q-icon
                                    :name="
                                        isPwd ? 'visibility_off' : 'visibility'
                                    "
                                    class="cursor-pointer"
                                    @click="isPwd = !isPwd"
                                />
                            </template>
                             <template v-slot:prepend>
                                <q-icon name="lock" />
                            </template>
                        </q-input>
                        <div class="q-pa-md q-gutter-sm">
                            <q-btn
                                label="Cadastrar"
                                type="submit"
                                color="primary"
                            />
                        </div>
                    </q-form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { ref, onMounted, computed } from "vue";
import axios from "axios";
import { useRouter, useRoute } from "vue-router";
import {useQuasar} from "quasar";

export default {
    name: "Register",
    setup() {
        const user = ref({
            name: "",
            email: "",
            password: "",
            password_confirmation: "",
        });
        const errors = ref({});
        const message = ref("");
        const $q = useQuasar();

        const router = useRouter();
        const route = useRoute();

        async function addUser()
        {
            const resp = await axios.post('/api/register', {...user.value})
            $q.localStorage.set('token', resp.data.token);
            $q.localStorage.set('name', resp.data.user.name)
            router.push('/listar/clientes')
        }

        return {
            user,
            addUser,
            isPwd: ref(true),
        };
    },

    // methods: {
    //     addUser() {
    //         console.log(this.user);
    //         // const form = new FormData();
    //         // form.append("_method", "POST");
    //         // form.append("name", nome.value[0]);
    //         // form.append("email", email.value[0]);
    //         // form.append("password", password.value[0]);

    //         // this.axios
    //         //     .post("http://127.0.0.1:8000/api/store", this.register)
    //         //     .then((response) =>
    //         //         this.$router
    //         //             .push({
    //         //                 name: "",
    //         //                 email: "",
    //         //                 password: "",
    //         //             })
    //         //             .catch((error) => console.log(error))
    //         //             .finally(() => (this.loading = false))
    //         //     );
    //     },
    // },
};
</script>
