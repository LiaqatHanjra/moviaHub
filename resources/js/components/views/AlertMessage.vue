<template>
    <div v-if="message" :class="`alert alert-${type}`" role="alert">
      {{ message }}
      <button type="button" class="close" aria-label="Close" @click="closeAlert">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      message: {
        type: String,
        default: "",
      },
      type: {
        type: String,
        default: "success", // 'success' or 'danger' (for error)
      },
    },
    methods: {
      closeAlert() {
        this.$emit('close');
      },
    },
  };
  </script>
  
  <style scoped>
  .alert {
    margin-bottom: 1rem;
    margin-top: 1rem;
    position: relative; 
  }
  
  .close {
    position: absolute;
    top: 10px; 
    right: 10px; 
    background: none;
    border: none;
    font-size: 1.5rem; 
    cursor: pointer;
    color: inherit; 
  }
  
  .close:focus {
    outline: none; 
  }
  </style>
  