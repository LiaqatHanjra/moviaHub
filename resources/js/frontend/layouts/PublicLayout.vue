<template>
  <PublicHeader />
  <slot />
  <PublicFooter />
</template>

<script setup>
import PublicHeader from '../components/PublicHeader.vue';
import PublicFooter from '../components/PublicFooter.vue';
</script>
