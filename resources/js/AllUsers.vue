<template>
  <div>
    <h3 class="text-center">Usuários Cadastrados</h3>

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
        <tr v-for="usuario in usuarios">
          <td>{{ usuarios.id }}</td>
          <td>{{ usuarios.nome }}</td>
          <td>{{ usuarios.sobrenome }}</td>
          <td>{{ usuarios.email }}</td>
          <td>{{ usuarios.telefone }}</td>
          <td>{{ usuarios.idade }}</td>

          <td>
            <div class="btn-group" role="group">
                <router-link :to="{name: 'edit', params:{id: usuario.id }}" class="btn tbn-primary">
                <button class="btn btn-danger" @click="delete(usuario.id)">Delete</button>
                </router-link>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

