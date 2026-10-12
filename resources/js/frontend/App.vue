<template>
  <component :is="layout">
    <router-view :key="$route.fullPath" />
  </component>
</template>

<script>
import { computed } from 'vue';
import { useRoute } from 'vue-router';
import PublicLayout from './layouts/PublicLayout.vue';
import AuthLayout from './layouts/AuthLayout.vue';

export default {
    name: 'FrontendApp',
    setup() {
        const route = useRoute();
        const layout = computed(() => (route.meta.layout === 'auth' ? AuthLayout : PublicLayout));

        return { layout };
    },
};
</script>
