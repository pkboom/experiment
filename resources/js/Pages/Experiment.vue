<template>
  <child-component />
</template>

<script>
import ChildComponent from './ChildComponent'

export default {
  components: {
    ChildComponent,
  },
  setup() {
    console.log(navigator.bluetooth)
  },
  mounted() {
    console.log('mounted')
  },
  methods: {},
}
</script>
