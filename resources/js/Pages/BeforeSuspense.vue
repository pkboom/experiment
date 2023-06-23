<template>
  <div class="async-component" :class="!loading && 'loaded'">
    <Spinner v-if="loading" />
    <slot />
  </div>
</template>

<script setup>
import { ref } from 'vue'
import Spinner from './Spinner.vue'

const loading = ref(true)
const { time } = defineProps({
  time: {
    type: Number,
    default: 2000,
  },
})

setTimeout(() => (loading.value = false), time)
</script>

<style scoped>
.async-component {
  border: 1px solid rgb(200, 200, 200);
  border-radius: 10px;
  background: rgba(255, 255, 255, 0.1);
  padding: 32px;
  margin: 20px;
}

.loaded {
  background: rgba(0, 255, 100, 0.3);
  border-color: rgb(0, 255, 100);
}
</style>
