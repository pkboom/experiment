<template>
  <div>child component</div>
</template>

<script>
// import eventBus from '../eventBus'

export default {
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
