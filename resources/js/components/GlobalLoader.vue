<template>
  <transition name="global-loader-fade">
    <div v-if="loaderState.visible" class="global-loader" role="status" aria-live="polite" aria-label="Loading">
      <div class="global-loader-spinner"></div>
    </div>
  </transition>
</template>

<script>
import { loaderState } from '../loader';

export default {
  name: 'GlobalLoader',
  setup() {
    return { loaderState };
  },
};
</script>

<style scoped>
.global-loader {
  position: fixed;
  inset: 0;
  z-index: 99999;
  display: flex;
  align-items: center;
  justify-content: center;
  background: rgba(16, 20, 26, 0.85);
  backdrop-filter: blur(2px);
}

.global-loader-spinner {
  width: 3.5rem;
  height: 3.5rem;
  border: 4px solid rgba(147, 204, 255, 0.2);
  border-top-color: #3198dc;
  border-radius: 50%;
  animation: global-loader-spin 0.8s linear infinite;
}

.global-loader-fade-enter-active,
.global-loader-fade-leave-active {
  transition: opacity 0.2s ease;
}

.global-loader-fade-enter-from,
.global-loader-fade-leave-to {
  opacity: 0;
}

@keyframes global-loader-spin {
  to {
    transform: rotate(360deg);
  }
}
</style>
