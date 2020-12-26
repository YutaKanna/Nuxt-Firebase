<template>
  <div>
    <section class="container">
        <ul v-for="(item, key) in items">
            <li>{{item.title}}</li>
        </ul>
    </section>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  layout: 'app',
  head() {
    return {
      meta: [
        {
          Authorization: 'Bearer f83525680591a1843c31d71019528acb9d8a1d9b'
        }
      ]
    }
  },
  async asyncData({ app }) {
    const items = await app.$axios.$get('https://qiita.com/api/v2/items?query=tag:nuxt.js');
    console.log(items);
    return {
      items
    }
  }
}
</script>