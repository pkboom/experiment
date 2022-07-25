<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3'
import { ref, onMounted } from 'vue'
import autoAnimate from '@formkit/auto-animate'

const dropdown = ref()
const show = ref(false)

onMounted(() => {
  autoAnimate(dropdown.value)
})
</script>

<template>
  <Head title="Welcome" />
  <div class="focus-within:shadow-lg">
    <input type="text" />
  </div>
  <div ref="dropdown" class="">
    <strong class="" @click="show = !show">Click me to open!</strong>

    <p class="" v-if="show">
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores eos reprehenderit soluta, beatae, delectus fugiat, dolore iusto
      incidunt nobis quam modi quo eius a quod mollitia sunt iste autem repudiandae!
    </p>
  </div>
</template>
