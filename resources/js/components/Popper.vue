<template>
  <div>
    <button
      ref="button"
      aria-describedby="tooltip"
      @click="show = !show"
      class="border px-4 py-2"
    >
      My button
    </button>
    <div id="tooltip" role="tooltip" :class="show ? 'block' : 'hidden'">
      <textarea name="" id="" cols="30" rows="10"></textarea>
      <div id="arrow" data-popper-arrow></div>
    </div>
  </div>
</template>

<script>
import { createPopper } from '@popperjs/core'

export default {
  props: [],

  data() {
    return {
      show: false,
    }
  },

  mounted() {
    const button = this.$refs.button
    const tooltip = this.$refs.tooltip
    this.createPopper(button, tooltip, {
      placement: 'top',
      modifiers: [
        {
          name: 'offset',
          options: {
            offset: [0, 8],
          },
        },
      ],
    })
  },

  methods: {
    createPopper,
  },
}
</script>

<style scoped>
/* #tooltip {
  display: none;
}

#tooltip[data-show] {
  display: block;
} */
#tooltip {
  background: #333;
  font-weight: bold;
  padding: 4px 8px;
  font-size: 13px;
  border-radius: 4px;
}
#arrow,
#arrow::before {
  position: absolute;
  width: 8px;
  height: 8px;
  z-index: -1;
}

#arrow::before {
  content: '';
  transform: rotate(45deg);
  background: #333;
}
#tooltip[data-popper-placement^='top'] > #arrow {
  bottom: -4px;
}

#tooltip[data-popper-placement^='bottom'] > #arrow {
  top: -4px;
}

#tooltip[data-popper-placement^='left'] > #arrow {
  right: -4px;
}

#tooltip[data-popper-placement^='right'] > #arrow {
  left: -4px;
}
</style>