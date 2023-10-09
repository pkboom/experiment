<template>
  <Head title="Timer" />
  <div class="flex min-h-screen flex-col items-center justify-center space-y-4">
    <div class="flex items-center space-x-2 text-6xl">
      <span>{{ displayMinutes }}</span>
      <span class="mb-2">:</span>
      <span>{{ displaySeconds }}</span>
    </div>
    <div class="grid grid-cols-3 gap-4">
      <button
        v-for="min in [5, 10, 20, 25, 30, 60, 80]"
        :key="min"
        type="button"
        class="border rounded-lg border-gray-400 px-8 py-4 text-3xl hover:border-indigo-500 hover:text-indigo-500"
        @click="start(min)"
      >
        {{ min }}
      </button>
      <button
        type="button"
        class="border rounded-lg border-gray-400 px-8 py-4 text-3xl hover:border-indigo-500 hover:text-indigo-500"
        @click="stop"
      >
        Stop
      </button>
    </div>
    <div id="stopped" class="text-3xl text-green-600 opacity-0">Stopped</div>
    <audio id="new-order" src="/sound/new-order.ogg" preload="auto" />
  </div>
</template>

<script setup>
import { ref, computed, onMounted, onBeforeUnmount } from 'vue'
import { Head } from '@inertiajs/vue3'

const timer = ref(null)
const minutes = ref(0)
const seconds = ref(0)

const displayMinutes = computed(() => {
  if (minutes.value < 0) return 0

  return minutes.value
})

const displaySeconds = computed(() => {
  if (seconds.value < 0) return '00'

  return seconds.value.toString().padStart(2, '0')
})

onMounted(() => {
  document.addEventListener('keydown', useHotKeys)
})

onBeforeUnmount(() => {
  clearInterval(timer.value)

  document.removeEventListener('keydown', useHotKeys)
})

function start(duration = 0) {
  if (timer.value) return

  timerFavicon()

  let minToSec = duration ? 60 * duration : 60 * minutes.value
  let milliseconds = minToSec * 1000

  let now = new Date().getTime()
  let future = now + milliseconds

  minutes.value = Math.floor((future - now) / 60 / 1000)
  seconds.value = Math.floor(((future - now) % (60 * 1000)) / 1000)

  let count = 0

  timer.value = setInterval(() => {
    now = new Date().getTime()

    if (future - now <= 0 && count++ % 6 === 0) {
      timesUpFavicon()

      document
        .getElementById('new-order')
        .play()
        .catch(() => alert("Can't play sound."))
    }

    minutes.value = Math.floor((future - now) / 60 / 1000)
    seconds.value = Math.floor(((future - now) % (60 * 1000)) / 1000)
  }, 1000)
}

function stop() {
  console.log('Stopped')

  document.getElementById('stopped').style.opacity = '1'

  defaultFavicon()

  clearInterval(timer.value)

  timer.value = null
  minutes.value = 0
  seconds.value = 0

  setTimeout(() => {
    document.getElementById('stopped').style.opacity = '0'
  }, 4000)
}

function useHotKeys(e) {
  if (e.key === 's') {
    e.preventDefault()

    timer.value ? stop() : start()
  }

  if (e.key === 'i') {
    e.preventDefault()

    minutes.value += 10
  }

  if (e.key === 'd') {
    e.preventDefault()

    minutes.value -= 10
  }
}

function defaultFavicon() {
  favicon('/favicon-32x32.png')
}

function timesUpFavicon() {
  favicon('/timer-32x32.png')
}

function timerFavicon() {
  favicon('/timer-32x32.png')
}

function favicon(favicon = null) {
  let links = [...document.querySelectorAll('link[rel="icon"]')]

  links.forEach(link => (link.href = favicon))
}
</script>
