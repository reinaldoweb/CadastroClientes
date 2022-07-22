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
                <router-link to="/" class="nav-item nav-link">Home</router-link>
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
        <q-form @click="save" class="q-gutter-md">

          <div class="row q-col-gutter-md">
            <q-input
              outlined
              v-model="nome"
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
              v-model="sobreNome"
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
              v-model="email"
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
              v-model="telefone"
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
              v-model="endereco"
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
              v-model.number="idade"
              type="number"
              label="Idade"
              stack-label
              class="col-md-12 col-sm-12 col-xs-12"
            />
          </div>

          <div class="q-pa-md q-gutter-sm">
            <q-btn label="Enviar" type="submit" color="primary" />
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
    </q-layout>
  </div>
</template>
 <script>
import axios, { Axios } from 'axios';
// save({
//     method: "post",
//     url:"";
//     data:{
//       nome: "",
//       sobreNome: "",
//       email: "",
//       telefone: "",
//       endereco: "",
//       idade: null,
//     }
// });
export default {
  data() {
    return {
      nome: "",
      sobreNome: "",
      email: "",
      telefone: "",
      endereco: "",
      idade: null,
    };
  },


 }
</script>
