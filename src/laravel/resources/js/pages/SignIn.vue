<template>
    <v-app>
        <v-content>
            <v-container fluid fill-height>
                <v-layout align-center justify-center>
                    <v-flex xs12 sm8 md4>
                        <v-card class="elevation-12">
                            <v-toolbar dark color="primary">
                                <v-toolbar-title>Sign In</v-toolbar-title>
                                <v-spacer></v-spacer>
                            </v-toolbar>
                            <v-form @submit.prevent="signIn">
                                <v-card-text>
                                    <v-text-field name="email" label="Email" type="email" prepend-icon="person" v-model="signInForm.email"></v-text-field>
                                    <v-text-field name="password" label="Password" type="password" prepend-icon="lock" v-model="signInForm.password"></v-text-field>
                                </v-card-text>
                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn color="primary" type="submit" :disabled="!signInForm.email || !signInForm.password">Sign In</v-btn>
                                </v-card-actions>
                            </v-form>
                        </v-card>
                    </v-flex>
                </v-layout>
            </v-container>
        </v-content>
    </v-app>
</template>

<script>
    export default {
        name: "SignIn",
        data () {
            return {
                signInForm: {
                    email: '',
                    password: ''
                },
            }
        },
        methods: {
            async signIn () {

                await this.$store.dispatch('auth/signIn', this.signInForm);

                this.$router.push('/');
            }
        }
    }
</script>

<style scoped>

</style>