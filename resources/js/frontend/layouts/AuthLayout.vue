<template>
  <SiteMenu  />
  <slot />
  <SiteFooter  />
</template>

<script setup>
import SiteMenu from '../components/SiteMenu.vue';
import SiteFooter from '../components/SiteFooter.vue';
</script>
