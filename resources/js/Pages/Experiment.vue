<template>
  <div>{{ count }}</div>
  <button @click="printPage">Print</button>
  <button @click="fetch">Fetch from welcome</button>
</template>

<script>
import { ref, watchEffect } from 'vue'
import Http from '@/Utils/Http'

export default {
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
  methods: {
    fetch() {
      Http.get('/api/welcome').then((response) => {
        let data = response.data

        console.log(data)
      })
    },
  },
}
</script>
