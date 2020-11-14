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
  var type = db.collection(collection).doc(id);

  type.get().then(function(doc) {
    if (doc.exists) {
      console.log("Document data:", doc.data());
      console.log(doc.get('name'));
    } else {
      // doc.data() will be undefined in this case
      console.log("No such document!");
    }
  }).catch(function(error) {
    console.log("Error getting document:", error);
  });
}
</script>