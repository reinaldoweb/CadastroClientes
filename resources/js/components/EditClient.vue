<template>
    <div>
        <h3 class="text-center">Edit client</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateClient">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="client.nome">
                    </div>
                    <div class="form-group">
                        <label>Sobre nome</label>
                        <input type="text" class="form-control" v-model="client.sobreNome">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" v-model="client.email">
                    </div>
                    <div class="form-group">
                        <label>Telefone</label>
                        <input type="text" class="form-control" v-model="client.telefone">
                    </div>
                    <div class="form-group">
                        <label>Idade</label>
                        <input type="text" class="form-control" v-model="client.idade">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import { ref } from 'vue'
export default {
    name: 'EditClient',
    setup(){
        const client = ref({
            nome: '',
            sobreNome: '',
            telefone: '',
            idade: '',
            email: ''
        })




        return {
            client
        }
    }
}
</script>
