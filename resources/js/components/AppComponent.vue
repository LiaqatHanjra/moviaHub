<template>
    <div class="app-component">
        <h1>{{ message }}</h1>
    </div>
</template>

<script>
export default {
    data() {
        return {
            message: 'Hello from Vue.js! test'
        }
    }
}
</script>

<style scoped>
.app-component {
    color: #42b983;
}
</style>
