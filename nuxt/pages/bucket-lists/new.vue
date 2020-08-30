<template>
    <form @submit.prevent="submit">
      <input type="text" name="title" />
      <input type="text" name="description" />
      <button type="submit">submit</button>
  </form>
</template>


<script>
import axios from 'axios';
  export default {
    data() {
      return {
        form: {
          title: '',
          description: ''
        }
      }
    },
    methods: {
      submit: function () {
        console.log('exec')
      }
    }
  }
</script>