<template>
    <div class="container">
        <div class="row justify-center">
            <q-card style="margin-top: 100px">
                <q-card-section class="text-center">
                    <h5 class="text-weight-bolder">Login</h5>
                </q-card-section>
                <q-card-section>
                    <q-form @submit.prevent="login">
                        <div class="q-pa-md">
                            <q-input
                                v-model="user.email"
                                type="email"
                                label="E-mail"
                            >
                            <template v-slot:prepend>
                                <q-icon name="mail" />
                            </template>
                            </q-input>
                        </div>
                        <div class="q-pa-md">
                            <q-input
                                v-model="user.password"
                                label="Password"
                                icon=""
                                :type="isPwd ? 'password' : 'text'"
                            >
                                <template v-slot:append>
                                    <q-icon
                                        :name="
                                            isPwd
                                                ? 'visibility_off'
                                                : 'visibility'
                                        "
                                        class="cursor-pointer"
                                        @click="isPwd = !isPwd"
                                    />
                                </template>
                                <template v-slot:prepend>
                                <q-icon name="lock" />
                            </template>
                            </q-input>
                        </div>
                        <div class="q-pa-md">
                            <q-btn
                                color="primary"
                                label="Logar"
                                type="submit"
                                value
                            />
                        </div>
                    </q-form>
                </q-card-section>
                <div class="q-pa-md justify-center">
                    <p class="text-center">Você não tem conta?</p>
                    <router-link to="/user/register">
                        <p class="text-center">
                            Crie uma conta aqui.
                        </p></router-link
                    >
                </div>
            </q-card>
        </div>
    </div>
</template>

<script>
import { ref, onMounted, computed } from "vue";
import axios from "axios";
import { useRouter, useRoute } from "vue-router";
import { useQuasar } from "quasar";

export default {
    name: "Login",
    setup() {
        const user = ref({
            email: "",
            password: "",
        });
        const $q = useQuasar();
        const router = useRouter();

        async function login() {
            const { data } = await axios.post("/api/login", { ...user.value });
            $q.localStorage.set("token", data.token);
            $q.localStorage.set("name", data.user.name);
            if (data.token) {
                router.push("/listar/clientes");
            }
        }

        return {
            user,
            login,
            isPwd: ref(true),
        };
    },
};
</script>
