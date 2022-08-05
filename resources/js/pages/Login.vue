<template>
    <div class="container">

        <h4 class="text-weight-bolder text-center">Pagina de Login</h4>
        <div class="row q-pa-md justify-center">

                    <q-form @submit.prevent.stop="onSubmit">
                <q-card class="my-card">
                    <div class="q-pa-md">
                        <q-input
                            v-model="user.nome"
                            filled
                            type="text"
                            label="Usuário"
                        />
                    </div>
                    <div class="q-pa-md">
                        <q-input
                            v-model="user.password"
                            filled
                            :type="isPwd ? 'password' : 'text'"
                            label="Senha"
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
                        </q-input>
                        <div><q-btn color="primary" label="Logar" /></div>
                    </div>
                </q-card>
            </q-form>
            </div>
        </div>

</template>

<script>
import { ref } from "vue";

export default {
    name: "Login",
    setup() {
        const user = ref({
            usuario: "",
            password: "",
            isPwd: "",
        });
        return {
            user,
            isPwd: ref(true),
        };
    },
};
</script>
