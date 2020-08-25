<template>
  <div>
    <section class="container">
        <p>title: {{bucketList.title}}</p>
        <p>description: {{bucketList.description}}</p>
    </section>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  data: function () {
    return {
        title: '',
        description: '',
    }
  },
  async asyncData({params}) {
    const { data } = await axios.get(`http://localhost:8000/api/bucket-lists/${params.id}`)
    return { bucketList: data.data.bucketList }
  }
}
</script>