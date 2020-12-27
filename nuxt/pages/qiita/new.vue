<template>
  <div>
    <div>Qiitaに記事を投稿する</div>
    <form method="post" @submit.prevent="submit">
        <input type="text" name="title" v-model="title" />
        <input type="text" name="body" v-model="body" />
        <input type="text" name="tag" v-model="tag" />
        <button type="submit">submit</button>
    </form>
  </div>
</template>

<script>
import axios from 'axios';
  export default {
    data: function() {
      return {
        title: '',
        body: '',
        tag: ''
      }
    },
    methods: {
      async submit() {
        const response = await this.$axios.$post
        ('https://qiita.com/api/v2/items', {
            body: this.body,
            "tags": [
              {
                "name": this.tag
              }
            ],
            title: this.title
        },
        {
          headers:
            {
                'Authorization': 'Bearer ' + process.env.QIITA_TOKEN
            }
        }).then(this.$router.push('/qiita'));
      }
    }
  }
</script>
