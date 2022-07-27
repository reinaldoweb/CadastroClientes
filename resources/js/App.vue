<template>
    <q-layout
        view=""
        container
        style="height: 850px"
        class="shadow-1 "
    >
        <Header class=""/>
        <router-view></router-view>
    </q-layout>
</template>
<script>
import Header from "./components/Header.vue";

export default {
    name: "App",
    components: {
        Header,
    },
};
</script>
