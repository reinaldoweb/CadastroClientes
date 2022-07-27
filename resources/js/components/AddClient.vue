<template>
  <div class="container" padding>
    <h4 class="q-pt-20">Adicionar novo Cliente <span v-if="message"> {{message}}</span></h4>
    <q-form @submit.prevent="save" class="q-gutter-md">
      <div class="row q-col-gutter-md">
        <q-input
          outlined
          v-model="cliente.nome"
          label="Nome"
          stack-label
          dense
          class="col-md-12 col-sm-12 col-xs-12"
          :error-message="`${errors.name}`"
          bottom-slots
        >
            <template v-slot:prepend>
                <q-icon name="person" />
            </template>
            <template v-slot:error>
                Please use maximum 3 characters.
            </template>
        </q-input>
        <q-input
          outlined
          v-model="cliente.sobrenome"
          label="Sobre Nome"
          stack-label
          dense
          class="col-md-12 col-sm-12 col-xs-12"
        >
          <template v-slot:prepend>
            <q-icon name="person" />
          </template>
        </q-input>

        <q-input
          outlined
          v-model="cliente.email"
          label="E-mail"
          suffix="@seuemail.com"
          stack-label
          dense
          class="col-md-12 col-sm-12 col-xs-12"
        >
          <template v-slot:prepend>
            <q-icon name="mail" />
          </template>
        </q-input>

        <q-input
          outlined
          v-model="cliente.telefone"
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
          v-model="cliente.endereco"
          label="Endereço"
          stack-label
          dense
          class="col-md-12 col-sm-12 col-xs-12"
        >

          <template v-slot:prepend>
            <q-icon name="home" />
          </template>
        </q-input>

         <q-input
          outlined
          v-model.number="cliente.cidade"
          type="text"
          label="cidade"
          stack-label
          dense
          class="col-md-12 col-sm-12 col-xs-12"
        />
         <q-input
          outlined
          v-model.number="cliente.uf"
          label="Uf"
          stack-label
          dense
          class="col-md-12 col-sm-12 col-xs-12"
        />

        <q-input
          outlined
          v-model.number="cliente.idade"
          type="number"
          label="Idade"
          stack-label
          dense
          class="col-md-12 col-sm-12 col-xs-12"
        />
      </div>

      <div class="q-pa-md q-gutter-sm">
        <q-btn
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
import { ref, onMounted } from 'vue'
import axios from 'axios'
import { useRouter, useRoute } from 'vue-router'
export default {
    name: 'AddClient',
    setup(props, {root}) {
        const cliente = ref({
            nome: '',
            sobrenome: '',
            telefone: '',
            email: '',
            endereco: '',
            idade: ''
        })
        const errors = ref({})
        const message = ref('');

        const router = useRouter()
        const route = useRoute()

        onMounted(()=>{
            getUsuario()
        })
        async function getUsuario()
        {
            const {data} = await axios.get(`/api/clientes/${route.params.id}`)
            cliente.value = data
        }

        async function save(){
            try {
                const resp = await axios.post('/api/clientes', {...cliente.value})
                if(resp.status){
                    router.push({path: '/listar/clientes'})
                }
            } catch (error) {
                errors.value = error.response.data.errors
                message.value = error.response.data.message
            }
        }

        return {
            save,
            cliente,
            message,
            errors
        }
    }
}
</script>
