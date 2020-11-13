<template>
  <div>
    <section class="container">
        <div>{{type.name}}</div>
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
      type: await detail("types", typeId)
    };
  }
}

async function detail(collection, id) {
  let obj = [];
  const db = firebase.firestore()
  db.collection(collection)
  .doc(id)
  .get()
  .then(function(doc) {
    if (doc.exists) {
      console.log("Document data:", doc.data());
      obj.push(doc.data());
    } else {
      console.log("No user");
    }
  })
  .catch(function(error) {
    console.log("Error : ", error);
  })
  return obj;
}

</script>