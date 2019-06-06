<template>
    <div class="panel">
        <h1>Sign In</h1>
        <form class="form" @submit.prevent="signIn">
            <label for="login-email">Email</label>
            <input type="text" class="form__item" id="login-email" v-model="signInForm.email">
            <label for="login-password">Password</label>
            <input type="password" class="form__item" id="login-password" v-model="signInForm.password">
            <div class="form__button">
                <button type="submit" class="button button--inverse">login</button>
            </div>
        </form>
    </div>
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