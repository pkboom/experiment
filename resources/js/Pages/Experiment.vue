<template>
  <div>asdf</div>
</template>

<script>
export default {
  data() {
    return {}
  },
  mounted() {
    let createElement = btoa(
      "(html) => (([{ firstElementChild }]) => firstElementChild)(((div) => [div, (div.innerHTML = html)])(document.createElement('div')))",
    )
    console.log(createElement)

    let aToB = atob(createElement)

    let asdf = eval(aToB)('<div>it is created</div>')

    console.log(asdf)
  },
  methods: {
    // function(html) {
    //   return (([{ firstElementChild }]) => firstElementChild)(((div) => [div, (div.innerHTML = html)])(document.createElement('div')))
    // },
  },
}
</script>
