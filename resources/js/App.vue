<template>
    <q-layout
        view="lHh lpr lFf"
        container
        style="height: 850px"
        class="shadow-1 "
    >
        <Header class="q-mb-md"/>
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
