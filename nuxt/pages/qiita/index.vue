<template>
    <div>
        <section class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-wrap -mx-4 -my-8">
                    <div v-for="(item, key) in items">
                        <div class="py-8 px-4 lg:w-1/3">
                            <div class="h-full flex items-start">
                            <div class="w-12 flex-shrink-0 flex flex-col text-center leading-none">
                                <span class="text-gray-500 pb-2 mb-2 border-b-2 border-gray-200">Jul</span>
                                <span class="font-medium text-lg text-gray-800 title-font leading-none">18</span>
                            </div>
                            <div class="flex-grow pl-6">
                                <h2 class="tracking-widest text-xs title-font font-medium text-indigo-500 mb-1">{{item.tags[0]['name']}}</h2>
                                <nuxt-link :to="{name: 'qiita-id', params: {id: item.id}}"><h1 class="title-font text-xl font-medium text-gray-900 mb-3">{{item.title}}</h1></nuxt-link>
                                <p class="leading-relaxed mb-5">{{item.body}}</p>
                            </div>
                            </div>
                        </div>
                    </div>
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