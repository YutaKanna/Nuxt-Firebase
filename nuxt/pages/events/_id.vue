<template>
  <div>
    <section class="container">
        <form method="post" @submit.prevent="onSubmit">
          <input type="text" name="name" v-model="event.name" />
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
import firebase from "~/plugins/firebase.js"
import 'firebase/firestore'
export default {
  layout: 'app',
  data: function () {
    return {
      name: '',
    }
  },
  async asyncData({params}) {
    const eventId = `${params.id}`;
    return {
      event: await detail("events", eventId)
    };
  },
  methods: {
    async onSubmit() {
      const eventId = `${this.$route.params.id}`;
      var db = firebase.firestore()
      db.collection("events").doc(eventId).update({
        name: this.event.name,
      })
    },
    async deletete() {
      const eventId = `${this.$route.params.id}`;
      var db = firebase.firestore()
      db.collection("events").doc(eventId).delete()
    }
  }
}

async function detail(collection, id) {
  const db = firebase.firestore()
  const event = await db
    .collection(collection)
    .doc(id)
    .get()
    .then(doc => doc.data());
    return event
}
</script>