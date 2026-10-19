<template>

     <slot>

     </slot>

  </template>

  <script>
  import Header from '../layouts/SiteMenu.vue';
  import Footer from '../layouts/SiteFooter.vue';
  export default {
      components:{
          Header,
          Footer
      }
  }
  </script>
