<template>
  <div>
    <section class="container">
        <p>something</p>
    </section>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  layout: 'app',
  async asyncData({ app }) {
    const { data } = await app.$axios.get(`http://localhost:8000/api/bucket-lists`)
    return { bucketLists: data.data.bucketLists }
    console.log('bucketLists');
  }
}
</script>