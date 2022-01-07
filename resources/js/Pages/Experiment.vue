<template>
  <div>
    <form @submit.prevent="submit">
      <div class="pr-6 pb-8 w-full">
        <input v-model="form.name" />
        <input v-model="form.address" />
      </div>
      <div class="px-8 py-4 bg-gray-100 border-t border-gray-100 flex justify-end items-center">
        <button class="btn-blue" type="submit">Click</button>
      </div>
      <div>{{ form.messages }}</div>
    </form>
  </div>
</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3'
import Http from '../Utils/Http'

export default {
  setup() {
    const form = useForm({
      name: null,
      address: 1234,
      messages: [],
    })

    Http.get('/api/messages').then((response) => (form.messages = response.data.messages))

    return { form }
  },
  methods: {
    submit() {
      this.form.post('/experiment')
    },
  },
}
</script>
