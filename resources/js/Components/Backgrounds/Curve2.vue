<script setup>
import { ref, onMounted } from 'vue'

const width = 100
const height = 100
const number = 20
const amplitude = 25

const path = ref()

function render() {
  let points = []

  const offsetX = width / number
  console.log({ offsetX })

  for (let j = 0; j <= number; j++) {
    const delta = j / number
    const position = height / 2

    const offsetY = Math.cos(Math.PI * delta)
    console.log({ offsetY })

    const x = offsetX * j
    console.log({ x })
    const y = offsetY * amplitude + position
    console.log({ y })

    points.push({ x: x, y: y })
  }

  const curve = points.map(point => `${point.x} ${point.y}`).join(' ')

  path.value = `M ${curve}`
}

function color() {
  const hue = Math.ceil(Math.random() * 360)

  return `hsl( ${hue}, 100%, 50% )`
}

onMounted(() => render())
</script>

<template>
  <svg preserveAspectRatio="none" v-bind:viewBox="`0 0 ${width} ${height}`">
    <path fill="none" v-bind:stroke="color()" v-bind:d="path" />
  </svg>
</template>
