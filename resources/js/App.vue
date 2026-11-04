<template>
    <div>
        <GlobalLoader />
        <router-view v-slot="{ Component }">
            <component :is="Component" :key="$route.fullPath" />
        </router-view>
    </div>
</template>

<script>
import GlobalLoader from './components/GlobalLoader.vue';

export default {
    name: 'App',
    components: { GlobalLoader },
};
</script>
