<template>
  <div>{{ count }}</div>
  <button @click="printPage">Print</button>
</template>

<script>
import ChildComponent from './ChildComponent'
import { ref, watchEffect } from 'vue'

export default {
  components: {
    ChildComponent,
  },
  setup() {
    const count = ref(0)

    watchEffect((onInvalidate) => {
      console.log(count.value)

      onInvalidate(() => console.log('haha'))
    })

    return {
      count,
    }
  },
  mounted() {
    this.count++
    this.count++
  },
  methods: {},
}
</script>
