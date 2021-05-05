<template>
  <div ref="image"></div>
</template>

<script>
import { decode } from 'blurhash'

export default {
  props: {
    hash: String,
  },
  data() {
    return {
      width: 32,
      height: 32,
    }
  },
  mounted() {
    const pixels = decode(this.hash, this.width, this.height)

    const canvas = document.createElement('canvas')
    const ctx = canvas.getContext('2d')
    const imageData = ctx.createImageData(this.width, this.height)
    imageData.data.set(pixels)
    ctx.putImageData(imageData, 0, 0)

    console.log(this.$refs.image)
    this.$refs.image.appendChild(canvas)
  },
  methods: {},
}
</script>
