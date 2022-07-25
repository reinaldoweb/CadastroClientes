<template>
  <div class="q-pa-md">
    <q-layout
      view="lHh lpr lFf"
      container
      style="height: 850px"
      class="shadow-1 rounded-borders"
    >
      <q-header elevated class="bg-cyan">
        <q-toolbar inset>
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
              <div class="navbar-nav">
                <router-link to="/" class="nav-item nav-link"
                  >Home</router-link
                >
                <router-link to="/add" class="nav-item nav-link"
                  >Novo Cadastro</router-link
                >
              </div>
            </div>
          </nav>
        </q-toolbar>
      </q-header>

      <div class="container" padding>
        <h4 class="q-pt-20">Cadastro de Clientes</h4>

      </div>
    </q-layout>
      <router-view></router-view>
  </div>
</template>
 <script>
export default {}
</script>
