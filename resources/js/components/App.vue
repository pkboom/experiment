<template>
  <div id="app">
    <p>{{ greetings }}</p>
    <Hello car=" driving a Ferari" />
  </div>
</template>
<script>
// import Test from './components/Test.vue'
export default {
  name: 'app',
  //   components: {
  //     Test,
  //   },
  data() {
    return {
      greetings: 'App stays here',
    }
  },
}
</script>
