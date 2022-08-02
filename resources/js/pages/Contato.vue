<template>
    <div class="q-pa-xl">
        <h4 class="">Fale conosco</h4>
        <div class="q-gutter-md" style="max-width: 1000px" padding>
            <q-input v-model="contato.nome" label="Seu nome" />
            <q-input v-model="contato.email" label="E-mail" />
            <q-input v-model="contato.assunto" label="Assunto" />
            <q-input v-model="contato.telefone" label="Telefone" />
            <q-input
                v-model="contato.msg"
                label="Mensagem"
                filled
                type="textarea"
            />
            <div class="q-pa-md q-gutter-sm">
                <q-btn label="Enviar" type="submit" color="primary" />
            </div>
        </div>
    </div>
</template>
<script>
import { ref } from "vue";
export default {
    name: "Contato",
    setup() {
        const contato = ref({
            nome: "",
            email: "",
            assunto: "",
            telefone: "",
            msg: "",
        });
        return {
            contato,
        };
    },
};
</script>
