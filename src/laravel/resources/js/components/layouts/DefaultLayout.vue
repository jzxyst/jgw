<template>
    <v-app>
        <v-navigation-drawer app></v-navigation-drawer>
        <v-toolbar app></v-toolbar>
        <v-content>
            <transition name="fade" mode="out-in">
                <router-view />
            </transition>
        </v-content>
    </v-app>
</template>

<script>
    export default {
        name: "DefaultLayout"
    }
</script>

<style scoped>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .1s;
    }
    .fade-enter, .fade-leave-to {
        opacity: 0;
    }
</style>