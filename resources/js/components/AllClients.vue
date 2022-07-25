<template>
  <div>
    <h3 class="text-center">Clientes Cadastrados</h3>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Sobre Nome</th>
          <th>E-mail</th>
          <th>Idade</th>
          <th>Telefone</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="cliente in clientes" :key="cliente.id">
          <td>{{ cliente.id }}</td>
          <td>{{ cliente.nome }}</td>
          <td>{{ cliente.sobrenome }}</td>
          <td>{{ cliente.email }}</td>
          <td>{{ cliente.telefone }}</td>
          <td>{{ cliente.idade }}</td>

          <td>
            <div class="btn-group" role="group">
                <router-link :to="{name: 'edit', params:{id: cliente.id }}" class="btn tbn-primary">
                <button class="btn btn-danger" @click="delete(cliente.id)">Delete</button>
                </router-link>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default{
    data(){
        return {
            clientes: []
        }
    },
    created(){
        this.axios
        .get(`http://127.0.0.1/api/clients/${id}`)
        .then(response => {
            let i = this.clients.map(data => data.id).indexOf(id);
            this.clients.splice(i,1)
        });
    },
    methods:{
        deleteClient(id){
            this.axios
            .delete(`http://127.0.0.1:8000/api/client/delete/${id}`)
            .then(respnse=>{
                let i = this.clients.map(item=> item.id).indexOf(id);
                this.clients.splice(i,1)
            });
        }
    }
}
</script>

