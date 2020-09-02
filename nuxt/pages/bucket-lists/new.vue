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
      async submit() {
        console.log('bucket-lists');
        await this.$axios.$post('http://localhost:8000/api/bucket-listss', {
          title: this.form.title,
          description: this.form.description,
        })
        this.$router.push({ name: 'bucket-lists' });
      }
    }
  }
</script>