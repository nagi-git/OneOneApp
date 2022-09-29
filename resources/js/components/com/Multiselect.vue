<template>
  <div>
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

<style>
  .multiselect__tags {
    padding: 0;
    border-radius: 5px;
    border: 1px solid #ced4da;
    background: #fff;
    font-size: 14px;
  }
  .multiselect__placeholder {
    display: inline-block !important;
    margin-bottom: 0px !important;
    padding-top: 0px !important;
  }

  /* error class on multiselect */
  .multiselect.invalid .multiselect__tags {
    border: 1px solid #f86c6b !important;
  }

  /* override default multiselect styles */
  .multiselect__option--highlight {
    background: #428bca !important;
  }

  .multiselect__option--highlight:after {
    background: #428bca !important;
  }

  .multiselect__tags {
    padding: 5px !important;
    min-height: 10px;
  }

  .multiselect__placeholder{
    margin-left: 10px;
    margin-top: 2px;
  }

  .multiselect__tag {
    background: #f0f0f0 !important;
    border: 1px solid #ced4da !important;
    color: black !important;
    margin-bottom: 0px !important;
    margin-right: 5px !important;
  }

  .multiselect__tag-icon:after {
    color: rgba(60, 60, 60, 0.5) !important;
  }

  .multiselect__tag-icon:focus,
  .multiselect__tag-icon:hover {
    background: #f0f0f0 !important;
  }

  .multiselect__tag-icon:focus:after,
  .multiselect__tag-icon:hover:after {
    color: red !important;
  }
</style>