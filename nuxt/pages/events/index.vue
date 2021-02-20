<template>
  <div>
    <section class="container">
        <ul v-for="(event, key) in events">
            <li>{{event.name}} [{{key}}]</li>
        </ul>
    </section>
  </div>
</template>

<script>
import axios from 'axios';
import firebase from "~/plugins/firebase.js"
import 'firebase/firestore'
export default {
  layout: 'app',
  async asyncData({ params }) {
    return {
      events: await getAllDocs("events")
    };
  }
}

async function getAllDocs(collection) {
  let obj = [];
  const db = firebase.firestore()
  let colRef = db.collection(collection);
  const allSnapShot = await colRef.get();
  allSnapShot.forEach(doc => {
      obj.push(doc.data());
  });
  return obj;
}
</script>