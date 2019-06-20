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
                            <v-progress-linear class="ma-0" :indeterminate="isRequesting" :active="isRequesting"></v-progress-linear>
                            <v-form @submit.prevent="signIn">
                                <v-card-text>
                                    <v-text-field name="email" label="Email" type="email" prepend-icon="person" autofocus v-model="values.signInForm.email" :error="!!errors.signInForm.email" :error-messages="errors.signInForm.email" :disabled="isRequesting"></v-text-field>
                                    <v-text-field name="password" label="Password" type="password" prepend-icon="lock" v-model="values.signInForm.password" :error="!!errors.signInForm.password" :error-messages="errors.signInForm.password" :disabled="isRequesting"></v-text-field>
                                </v-card-text>
                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn color="primary" type="submit" :disabled="isAvailableSubmit">Sign In</v-btn>
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
                values: {
                    signInForm: {
                        email: '',
                        password: ''
                    },
                },
                errors: {
                    signInForm: {
                        email: null,
                        password: null
                    },
                },
                isRequesting: false
            }
        },
        computed: {
            isAvailableSubmit () {
                return !this.values.signInForm.email || !this.values.signInForm.password || this.isRequesting;
            },
        },
        methods: {
            async signIn () {

                this.clearErrors();

                // Call sign in api.
                this.startRequest();
                await this.$store.dispatch('auth/signIn', this.values.signInForm);
                this.endRequest();

                // Sign in succeeded.
                if (this.$store.getters['auth/isSignedIn']) {
                    this.$router.push(this.$route.query.redirect);
                } else {
                    this.assignErrors();
                }
            },

            startRequest () {
                this.isRequesting = true;
            },

            endRequest () {
                this.isRequesting = false;
            },

            clearErrors () {
                for (const key in this.errors.signInForm) {
                    this.errors.signInForm[key] = null;
                }
            },

            assignErrors () {
                this.errors.signInForm = this.$store.state.auth.api.errors;
            }
        }
    }
</script>

<style scoped>

</style>