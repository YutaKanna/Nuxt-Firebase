<template>
  <div>
    <section class="container">
        <div>自分が投稿した記事の一覧</div>
        <ul v-for="(item, key) in items">
          <nuxt-link :to="{name: 'qiita-id', params: {id: item.id}}">
            <li>{{item.title}}</li>
          </nuxt-link>
        </ul>
    </section>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  async asyncData({ app }) {
    const items = await app.$axios.$get('https://qiita.com/api/v2/authenticated_user/items', {
        headers: {'Content-Type': 'application/json', 'Authorization': process.env.QIITA_TOKEN}
    });
    return {
      items
    }
  }
}
</script>