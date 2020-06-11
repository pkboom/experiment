<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Example Component</div>

          <div class="card-body">
            I'm an example component.
          </div>
        </div>
      </div>
    </div>
    <button @click="reloadData">Reload</button>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log('Component mounted.')
  },
  methods: {
    reloadData() {
      fetch('http://experiment.test/orders')
        .then(response => response.json())
        .then(data => {
          console.log(data)
        })
        .catch(error => console.error(error))
    },
  },
}
</script>
