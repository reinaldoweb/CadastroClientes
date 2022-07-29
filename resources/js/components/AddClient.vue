<template>
<div class="container">
<div class="row q-pa-xl"  >
    <h4 class="q-pt-10">Adicionar novo Cliente <span v-if="message"> {{message}}</span></h4>

    <q-form @submit.prevent="save" class="">
      <div class="row q-col-gutter-md" >
        <q-input
          outlined
          v-model="cliente.nome"
          label="Nome"
          stack-label
          dense
          :error-message="`${errors.name}`"
          bottom-slots
         :error="!isValid"
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
          class=""
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
          class=""
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
          mask="(###)#####-####"
          unmasked-value
          dense
          class=""
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
          class=""
        >

          <template v-slot:prepend>
            <q-icon name="home" />
          </template>
        </q-input>
        <q-input
          outlined
          v-model="cliente.bairro"
          type="text"
          label="Bairro"
          stack-label
          dense
          class=""
        />
         <q-input
          outlined
          v-model="cliente.cidade"
          type="text"
          label="Cidade"
          stack-label
          dense
          class=""
        />
         <q-input
          outlined
          v-model="cliente.uf"
          label="UF"
          stack-label
          dense
          buttom-slots
          hint="Max 2 characters"
         error-message="Usar no maximo 2 caracteres"
        :error="!isValid"
        />

        <q-input
          outlined
          v-model="cliente.idade"
          type="number"
          label="Idade"
          stack-label
          dense

        />
      </div>

      <div class="q-pa-md q-gutter-sm">
        <q-btn
          label="Enviar"
          type="submit"
          color="primary"
        />

      </div>
    </q-form>
  </div>

</div>

</template>
<script>
import { ref, onMounted, computed } from 'vue'
import axios from 'axios'
import { useRouter, useRoute } from 'vue-router'


export default {
    name: 'AddClient',
    setup() {
        const cliente = ref({
            nome: '',
            sobrenome: '',
            telefone: '',
            email: '',
            endereco: '',
            cidade:'',
            uf:"",
            idade: ''
        })
        const model = ref('')
        const errors = ref({})
        const message = ref('')

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
            errors,
            model,
            isValid: computed(() => model.value.length <= 2)
        }
    }
}
</script>
