<template>
  <div>
    <multiselect
      v-model="value"
      :options="users"
      :multiple="true"
      :hide-selected="true"
      placeholder="参加予定のユーザー"
      label="name"
      track-by="name"
    ></multiselect>
  </div>
</template>

<script>
  import Multiselect from "vue-multiselect"
    export default {
      components: { Multiselect },
      data() {
        return {
          value: [],
        }
      },
      props: ["users"]
    }
</script>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>

<style>
  .multiselect__tags {
    max-height: 40px;
    padding: 8px 0 0 0;
    border-radius: 5px;
    border: 1px solid #ced4da;
    background: #fff;
    font-size: 12px;
  }
  .multiselect__tags-wrap {   
    margin-top: 0px;
  }
  .multiselect__placeholder{
    margin-left: 10px;
    margin-top: 2px;
  }
  .multiselect__input{
    font-size:12px;
  }
  .multiselect__content {
    font-size: 14px;
  }
</style>