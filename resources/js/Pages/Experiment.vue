<template>
  <div>asdf</div>
  <child-component />
</template>

<script>
import eventBus from '../eventBus'
import ChildComponent from './ChildComponent'

export default {
  components: {
    ChildComponent,
  },
  data() {
    console.log('experiment data')
    return {}
  },
  mounted() {
    console.log('experiment')
    console.log(eventBus)
  },
  methods: {},
}
</script>
