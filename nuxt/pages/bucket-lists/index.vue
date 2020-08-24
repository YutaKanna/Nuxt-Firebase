<template>
  <div>
    <section class="container">
        <div>hoge</div>
        <ul v-for="(bucketList, key) in bucketLists">
            <li>{{bucketList.title}} [{{key}}]</li>
        </ul>
    </section>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  async asyncData({ app }) {
    const { data } = await app.$axios.get(`http://localhost:8000/api/bucket-lists`)
    return { bucketLists: data.data.bucketLists }
    console.log('bucketLists');
  }
}
</script>