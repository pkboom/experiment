<template>
  <div>
    <div>
      <button ref="button" @click="showPopup = !showPopup">toggle</button>
    </div>
    <div
      v-show="showPopup"
      v-closable="{
        exclude: ['button'],
        handler: 'onClose'
      }"
      class="popup-box"
    >
      Test Popup Box
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      showPopup: false
    };
  },
  methods: {
    onClose() {
      this.showPopup = false;
    }
  }
};
</script>

<style  scoped>
.popup-box {
  position: absolute;
  left: 50%;
  top: 50px;
  transform: translateX(-50%);
  background: #f0f8ff;
  border-radius: 1px;
  box-shadow: 1px 1px 15px 0 rgba(0, 0, 0, 0.2);
  padding: 40px;
  color: #555585;
}
</style>