<template>
  <div>
    <section class="container">
        <ul v-for="(hoge, key) in hoge">
            <li>{{hoge.name}} [{{key}}]</li>
            <img src="@/assets/images/hoge.png">
        </ul>
    </section>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  layout: 'app',
  async asyncData({ app }) {
    const { data } = await app.$axios.get(`http://localhost:8000/api/hoge`)
    return { hoge: data.data.hoge }
  }
}
</script>