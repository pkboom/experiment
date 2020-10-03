require('./bootstrap')

import Vue from 'vue'
import App from './components/App.vue'
import MyPlugin from './components/MyPlugin.vue'
Vue.use(MyPlugin)

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key =>
  Vue.component(
    key
      .split('/')
      .pop()
      .split('.')[0],
    files(key).default
  )
)
Vue.component('Hello', {
  created() {
    console.log('created')
  },
  mounted() {
    console.log('mounted')
  },
  render(createElement) {
    console.log('render')
    return createElement('ul', [
      createElement('li', [
        createElement('p', 'I am a nested list item'),
        createElement('p', 'I am a nested list item'),
        createElement('p', 'I am a nested list item'),
      ]),
    ])
  },
  data() {
    return {
      greetings: 'Hello stays here',
    }
  },
  props: ['car'],
})

// const app = new Vue({
//   el: '#app',
// })
new Vue({
  render: h => h(App),
}).$mount('#app')
