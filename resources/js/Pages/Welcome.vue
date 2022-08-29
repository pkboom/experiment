<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import { ref, onMounted } from 'vue';
import autoAnimate from '@formkit/auto-animate';
import { pipe, range, filter, takeWhile, slice, toArray, concat } from 'lazy-collections';

// Lazy example
let program = pipe(
  range(0, 10_000_000),
  filter(x => x % 100 === 0),
  filter(x => x % 4 === 0),
  filter(x => x % 400 === 0),
  takeWhile(x => x < 1_000),
  slice(0, 1_000),
  toArray(),
);

program = pipe(concat([0, 1, 2], [3, 4, 5], [6, 7, 8], [9, 10]), toArray());
console.log([...program()]);
</script>

<template>
  <div>asdf</div>
</template>
