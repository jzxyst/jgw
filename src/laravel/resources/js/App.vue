<template>
    <transition name="fade" mode="out-in">
        <router-view/>
    </transition>
</template>

<script>
    export default {
        name: "App"
    }
</script>

<style scoped>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .7s;
    }
    .fade-enter, .fade-leave-to {
        opacity: 0;
    }
</style>