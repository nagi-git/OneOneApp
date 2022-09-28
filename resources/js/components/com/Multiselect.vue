<template>
  <div>
    <span>abc</span>
    <multiselect
      v-model="value"
      :options="options"
      :multiple="true"
      placeholder="Select one"
      label="name"
      track-by="code"
    ></multiselect>
  </div>
</template>

<script>
  import Multiselect from 'vue-multiselect'
    export default {
      components: { Multiselect },
      data() {
        return {
          value: null,
          options: [
            { name: "Vue.js", code: "vu" },
            { name: "Javascript", code: "js" },
            { name: "Open Source", code: "os" }
          ]
        }
      }
    }
</script>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>
  