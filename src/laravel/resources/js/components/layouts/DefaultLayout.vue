<template>
    <v-app>
        <v-navigation-drawer app></v-navigation-drawer>
        <v-toolbar app></v-toolbar>
        <v-content>
            <RouterView />
        </v-content>
    </v-app>
</template>

<script>
    export default {
        name: "DefaultLayout"
    }
</script>

<style scoped>

</style>