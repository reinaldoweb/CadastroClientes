<template>
<div class="container">
<div class="row justify-center">
    <div class="q-pa-md">
        <h4 class="">Cadastrar novo usuário</h4>
        <div class="q-gutter-md" style="max-width: 1000px" padding>
            <q-input v-model="user.nome" label="Nome" />
            <q-input v-model="user.email" label="E-mail" />
            <q-input v-model="user.password" label="Passaword" />

            <div class="q-pa-md q-gutter-sm">
                <q-btn label="Cadastrar" type="submit" color="primary" />
            </div>
        </div>
    </div>
</div>
</div>
</template>
<script>
import { ref } from "vue";
export default {
    name: "Register",
    setup() {
        const user = ref({
            nome: "",
            email: "",
            password:""

        });
        return {
            user,
        };
    },
};
</script>
