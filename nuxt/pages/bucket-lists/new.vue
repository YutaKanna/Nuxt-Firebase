<template>
  <form method="post" @submit.prevent="submit">
    <input type="text" name="title" v-model="title" />
    <input type="text" name="description" v-model="description" />
    <button type="submit">submit</button>
  </form>
</template>

<script>
import axios from 'axios';
let url = '/api/bucket-lists/new';
  export default {
    data: function() {
      return {
        title: '',
        description: ''
      }
    },
    methods: {
      async submit() {
        const response = await this.$axios.$post
          (url, {
              title: this.title,
              description: this.description,
          }).then(function(response) {
          this.router.push('/');
        });
      }
    }
  }
</script>