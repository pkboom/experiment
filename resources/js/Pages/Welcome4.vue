<template>
  <button @click="reload">Reload page</button>
  <Suspense>
    <WithSuspense :time="2000">
      <WithSuspense :time="1500" />
      <WithSuspense :time="1200">
        <WithSuspense :time="1000" />

        <Suspense>
          <WithSuspense :time="5000" />
          <template #fallback>
            <Placeholder />
          </template>
        </Suspense>
      </WithSuspense>
    </WithSuspense>
    <template #fallback>
      <Placeholder>
        <Placeholder />
        <Placeholder>
          <Placeholder />
          <Placeholder />
        </Placeholder>
      </Placeholder>
    </template>
  </Suspense>
</template>

<script setup>
import WithSuspense from './WithSuspense.vue'
import Placeholder from './Placeholder.vue'

const reload = () => {
  window.location.reload()
}
</script>

<style>
html {
  background: slategray;
}
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin: 60px auto 0 auto;
  max-width: 600px;
}

button {
  padding: 4px 12px;
  margin-bottom: 20px;
  background: white;
  font-size: 14px;
  border: 1px solid black;
  cursor: pointer;
}
</style>
