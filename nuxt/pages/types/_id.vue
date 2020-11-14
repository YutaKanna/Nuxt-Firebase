<template>
  <div>
    <section class="container">
        <div>{{this.name}}</div>
    </section>
  </div>
</template>

<script>
import axios from 'axios';
import firebase from "~/plugins/firebase.js"
import 'firebase/firestore'
export default {
  layout: 'app',
  async asyncData({params}) {
    const typeId = `${params.id}`;
    return {
      name: await detail("types", typeId)
    };
  }
}

async function detail(collection, id) {
  const db = firebase.firestore()
  const type = await db
    .collection(collection)
    .doc(id)
    .get()
    .then(doc => doc.data());
    return type
}
</script>