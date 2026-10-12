<template>
  <SiteMenu variant="public" />
  <slot />
  <SiteFooter variant="public" />
</template>

<script setup>
import SiteMenu from '../components/SiteMenu.vue';
import SiteFooter from '../components/SiteFooter.vue';
</script>
