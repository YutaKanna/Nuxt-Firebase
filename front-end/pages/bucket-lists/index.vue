<template>
    <ul>
        <li v-for="bucketList in bucketLists" :key="bucketList.id">
            <h4>
                <span>{{bucketList.title}}</span>
            </h4>
        </li>
    </ul>
</template>

<script>
import axios from 'axios'

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
