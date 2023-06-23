<template>
  <div class="async-component fast-gradient">
    <slot />
  </div>
</template>

<script setup>
import Spinner from './Spinner.vue'
</script>

<style scoped>
.async-component {
  border: 1px solid rgb(200, 200, 200);
  border-radius: 10px;
  background: rgba(255, 255, 255, 0.1);
  padding: 32px;
  margin: 20px;
}

.fast-gradient {
  background: linear-gradient(to right, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.4));
  background-size: 200% 200%;
  animation: gradient 2s ease-in-out infinite;
  z-index: 10;
}

@keyframes gradient {
  0% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
  100% {
    background-position: 0% 50%;
  }
}
</style>
