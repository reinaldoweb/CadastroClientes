<template>
  <div class="container" padding>
    <h4 class="q-pt-20">Cadastro de Clientes</h4>
    <q-form class="q-gutter-md">
      <div class="row q-col-gutter-md">
        <q-input
          outlined
          v-model="usuario.nome"
          label="Nome"
          stack-label
          :dense="dense"
          class="col-md-12 col-sm-12 col-xs-12"
        >
          <template v-slot:prepend>
            <q-icon name="person" />
          </template>
        </q-input>
        <q-input
          outlined
          v-model="usuario.sobreNome"
          label="Sobre Nome"
          stack-label
          :dense="dense"
          class="col-md-12 col-sm-12 col-xs-12"
        >
          <template v-slot:prepend>
            <q-icon name="person" />
          </template>
        </q-input>
        <q-input
          outlined
          v-model="usuario.email"
          label="E-mail"
          suffix="@seuemail.com"
          stack-label
          :dense="dense"
          class="col-md-12 col-sm-12 col-xs-12"
        >
          <template v-slot:prepend>
            <q-icon name="mail" />
          </template>
        </q-input>
        <q-input
          outlined
          v-model="usuario.telefone"
          label="Telefone"
          stack-label
          mask="(###) ##### - ####"
          unmasked-value
          class="col-md-12 col-sm-12 col-xs-12"
        >
          <template v-slot:prepend>
            <q-icon name="call" />
          </template>
        </q-input>

        <q-input
          outlined
          v-model="usuario.endereco"
          label="Endereço"
          stack-label
          :dense="dense"
          class="col-md-12 col-sm-12 col-xs-12"
        >
          <template v-slot:prepend>
            <q-icon name="home" />
          </template>
        </q-input>

        <q-input
          outlined
          v-model.number="usuario.idade"
          type="number"
          label="Idade"
          stack-label
          class="col-md-12 col-sm-12 col-xs-12"
        />
      </div>

      <div class="q-pa-md q-gutter-sm">
        <q-btn
          @click.prevent="add"
          label="Enviar"
          type="submit"
          color="primary"
        />
        <q-btn
          label="Reset"
          type="reset"
          color="primary"
          flat
          class="q-ml-sm"
        />
      </div>
    </q-form>
  </div>
</template>
<script>
export default {
    data() {
        return {
           cliets: {}
        }
    },

    methods: {
        addClient() {
            const resposta = await axios
                .post("http://127.0.0.1/api/add", this.client)
                .then(response =>(
                    this.$router.push({ name: 'home' })
                ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
    }
}
}
</script>
