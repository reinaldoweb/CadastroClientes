<template>
<div class="container">
<div class="row">

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
        <q-input
            v-model="image"
             @update:model-value="val => { file = val[0] }"
            filled
            type="file"
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
        const image = ref(null)
        const model = ref('')
        const errors = ref({})
        const message = ref('')

        const router = useRouter()
        const route = useRoute()

        onMounted(()=>{
            if(route.params.id){
                getUsuario()
            }

        })
        async function getUsuario()
        {
            const {data} = await axios.get(`/api/clientes/${route.params.id}`)
            cliente.value = data
        }

        async function save(){
            const form = new FormData();
            const url = !route.params.id ? '/api/clientes' : `/api/clientes/${route.params.id}`

            form.append('_method', !route.params.id ? 'POST' : 'PUT')
            form.append('image', image.value[0], image.value[0].name)
            form.append('nome', cliente.value.nome)
            form.append('sobrenome', cliente.value.sobrenome)
            form.append('telefone', cliente.value.telefone)
            form.append('email', cliente.value.email)
            form.append('bairro', cliente.value.bairro)
            form.append('endereco', cliente.value.endereco)
            form.append('cidade', cliente.value.cidade)
            form.append('uf', cliente.value.uf)
            form.append('idade', cliente.value.idade)

            try {
                const resp = await axios.post(url, form)
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
            image,
            isValid: computed(() => model.value.length <= 2)
        }
    }
}
</script>
