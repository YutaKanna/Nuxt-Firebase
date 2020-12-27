<template>
  <div>
    <section class="container">
        <form method="post" @submit.prevent="updatete">
          <input type="text" name="title" v-model="item.title" />
          <input type="text" name="body" v-model="item.body" />
          <input type="text" name="tag" v-model="item.tags[0]['name']" />
          <button type="submit">更新</button>
        </form>
        <form method="post" @submit.prevent="deletete">
          <button type="submit">削除</button>
        </form>
    </section>
  </div>
</template>

<script>
import axios from 'axios';
var axiosPost = axios.create({
  xsrfHeaderName: "X-XSRF-TOKEN",
  withCredentials: true
})
export default {
  data: function () {
    return {
        title: '',
        body: '',
        tag: ''
    }
  },
  async asyncData({params}) {
    const { data } = await axios.get(`https://qiita.com/api/v2/items/${params.id}`, {
        headers: {'Content-Type': 'application/json', 'Authorization': 'Bearer ' + process.env.QIITA_TOKEN}
    });
    return {
      item: data
    }
  },
  methods: {
    async updatete() {
      const response = await this.$axios.$patch
      (`https://qiita.com/api/v2/items/${this.$route.params.id}`, {
        body: this.item.body,
        tags: [
          {
            name: this.item.tags[0]['name']
          }
        ],
        title: this.item.title
      },
      {
        headers:
          {
            'Authorization': 'Bearer ' + process.env.QIITA_TOKEN
          }
      }).then(this.$router.push('/qiita'));
    },
    async deletete() {
      const response = await this.$axios.$delete
      (`https://qiita.com/api/v2/items/${this.$route.params.id}`, {
        headers:
          {
            'Authorization': 'Bearer ' + process.env.QIITA_TOKEN
          }
      }).then(this.$router.push('/qiita'));
    }
  }
}
</script>