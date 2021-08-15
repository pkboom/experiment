<template>
  <div>child component</div>
</template>

<script>
// import eventBus from '../eventBus'

export default {
  data() {
    console.log('child data')
    return {}
  },
  mounted() {
    console.log('child')
    // console.log(eventBus)
  },
  methods: {
    // function(html) {
    //   return (([{ firstElementChild }]) => firstElementChild)(((div) => [div, (div.innerHTML = html)])(document.createElement('div')))
    // },
  },
}
</script>
