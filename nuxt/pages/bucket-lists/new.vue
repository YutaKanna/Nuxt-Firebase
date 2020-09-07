<template>
  <form method="post" action = "http://localhost:8000/api/bucket-lists/new" @submit.prevent="post">
    <input type="text" name="title" v-model="title" />
    <input type="text" name="description" v-model="description" />
    <button type="submit">submit</button>
  </form>
</template>

<script>
import axios from 'axios';
var axiosPost = axios.create({
  xsrfHeaderName: "X-XSRF-TOKEN",
  withCredentials: true
})
  export default {
    data: function() {
      return {
        title: '',
        description: ''
      }
    },
    methods: {
      async post() {
        const url = "http://localhost:8000/api/bucket-lists/new";
        await axiosPost.post(url, {
          title: this.title,
          description: this.description,
          withCredentials: true,
        }).then(this.$router.push('/bucket-lists'));
      }
    }
  }
</script>
