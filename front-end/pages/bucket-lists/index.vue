<template>
  <div>
    <ul>
      <li v-for="bucketList in bucketLists" :key="bucketList.id">
        <p><span>{{bucketList.title}}</span></p>
      </li>
    </ul>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  layout: 'app',
  async asyncData({ $axios }) {
    const response = await $axios.$get("http://localhost:8000/api/bucket-lists")
      .catch( error => {
      console.log("response error", error)
        return false
      })
    return { bucketLists: response.bucketLists }
  }
}
</script>
