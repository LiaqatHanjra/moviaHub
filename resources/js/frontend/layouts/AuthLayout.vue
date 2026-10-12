<template>
  <SiteMenu variant="auth" />
  <slot />
  <SiteFooter variant="auth" />
</template>

<script setup>
import SiteMenu from '../components/SiteMenu.vue';
import SiteFooter from '../components/SiteFooter.vue';
</script>
