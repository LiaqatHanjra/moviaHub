<template>
  
  
    <slot />
</template>

<script>

import { defineComponent } from 'vue';
import Header from './PublicHeader.vue';
import Footer from './PublicFooter.vue';

export default defineComponent({
  name: 'GuestLayout',
  components: {
    Header,
    Footer
  }
});
</script>
