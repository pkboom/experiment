<script setup>
// import Line from './Backgrounds/Line.vue'
import Pattern from './Backgrounds/Pattern.vue'
</script>

<template>
  <div class="relative min-h-screen flex flex-col sm:justify-center items-center">
    <a class="relative w-16 h-16" href="/">
      <transition leave-active-class="transition ease-in duration-250" leave-from-class="opacity-100" leave-to-class="opacity-0">
        <img class="absolute w-16 h-16 select-none" src="/assets/capsules-logotype.svg" />
      </transition>
    </a>

    <div class="w-full sm:max-w-md">
      <slot />
    </div>

    <Pattern class="absolute -z-10 w-screen h-full" />
  </div>
</template>
