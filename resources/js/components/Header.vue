<template>
    <div class="q-pa-md">
        <div class="q-gutter-y-md column">
            <q-toolbar class="bg-primary text-white shadow-2 rounded-borders">
                <q-btn flat round dense icon="menu" class="q-mr-sm" />

                <q-separator dark vertical inset />

                <q-btn stretch flat label="Home" to="/" />
                <q-btn
                    stretch
                    flat
                    label="Listar Clientes"
                    to="/listar/clientes"
                />
                <q-btn
                    stretch
                    flat
                    label="Adicionar Cliente"
                    to="/adicionar/cliente"
                />
                <q-btn
                    stretch
                    flat
                    label="Fale conosco"
                    to="/cliente/contato/"
                />
                <q-space />

                <q-btn stretch flat label="Login" to="/user/login" />

                <q-separator dark vertical />
                <q-btn stretch flat label="Register" to="/user/register" />

                <q-separator dark vertical />

                <q-btn stretch flat label="Sair" to="/user/logout"/>
            </q-toolbar>
        </div>
    </div>

    <div class="q-pa-md">
        <div class="q-gutter-md">
            <q-carousel
                v-model="slide"
                transition-prev="scale"
                transition-next="scale"
                swipeable
                animated
                control-color="white"
                navigation
                padding
                arrows
                height="300px"
                class="bg-primary text-white shadow-1 rounded-borders"
            >
                <q-carousel-slide
                    name="style"
                    class="column no-wrap flex-center"
                >
                    <q-icon name="style" size="56px" />
                    <div class="q-mt-md text-center">
                        {{ lorem }}
                    </div>
                </q-carousel-slide>
                <q-carousel-slide name="tv" class="column no-wrap flex-center">
                    <q-icon name="live_tv" size="56px" />
                    <div class="q-mt-md text-center">
                        {{ lorem }}
                    </div>
                </q-carousel-slide>
                <q-carousel-slide
                    name="layers"
                    class="column no-wrap flex-center"
                >
                    <q-icon name="layers" size="56px" />
                    <div class="q-mt-md text-center">
                        {{ lorem }}
                    </div>
                </q-carousel-slide>
                <q-carousel-slide name="map" class="column no-wrap flex-center">
                    <q-icon name="terrain" size="56px" />
                    <div class="q-mt-md text-center">
                        {{ lorem }}
                    </div>
                </q-carousel-slide>
            </q-carousel>
        </div>
    </div>

</template>
<script>
import { ref } from "vue";
export default {
    name: "Header",
    setup() {
        return {
            slide: ref("style"),
            lorem: "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Itaque voluptatem totam, architecto cupiditate officia rerum, error dignissimos praesentium libero ab nemo.",
        };
    },
};
</script>
