<template>
  <div>
    <section class="container">
        <div>hoge</div>
        <p>{{bucketList.title}}</p>
    </section>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  async asyncData({ app }) {
    const { data } = await app.$axios.get(`http://localhost:8000/api/bucket-lists/{$id}`)
    return { bucketList: data.data.bucketList }
  }
}
</script>