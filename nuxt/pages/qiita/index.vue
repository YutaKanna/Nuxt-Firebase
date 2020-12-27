<template>
    <div>
        <section class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto">
                <div v-for="item in items" class="flex flex-wrap -mx-4 -my-8">
                    <p>{{ item.title }}</p><br>
                    <p>{{ item.tags[0]['name'] }}</p><br>
                    <p>{{ item.body }}</p>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import axios from 'axios';
export default {
  async asyncData({ app }) {
    const items = await app.$axios.$get('https://qiita.com/api/v2/authenticated_user/items', {
        headers: {'Content-Type': 'application/json', 'Authorization': 'Bearer ' + process.env.QIITA_TOKEN}
    });
    return {
      items
    }
  }
}
</script>