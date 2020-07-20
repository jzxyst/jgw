<template>
    <v-app>
        <v-navigation-drawer app clipped v-model="drawer">
            <v-list dense>
                <v-list-item to="/dashboard">
                    <v-list-item-action>
                        <v-icon>dashboard</v-icon>
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title>Dashboard</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item to="/userlist">
                    <v-list-item-action>
                        <v-icon>account_box</v-icon>
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title>UserList</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item to="/settings">
                    <v-list-item-action>
                        <v-icon>settings</v-icon>
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title>Settings</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </v-list>
        </v-navigation-drawer>
        <v-app-bar app fixed clipped-left dark color="primary">
            <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
            <v-toolbar-title>{{ this.$store.state.global.app.name }}</v-toolbar-title>
        </v-app-bar>
        <v-content>
            <transition name="fade" mode="out-in">
                <router-view />
            </transition>
        </v-content>
    </v-app>
</template>

<script>
    export default {
        name: "DefaultLayout",
        data () {
            return {
                drawer: true
            }
        }
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
