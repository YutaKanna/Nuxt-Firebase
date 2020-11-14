<template>
  <form method="post">
    <input type="text" name="name" v-model="name" />
    <button type="submit" @click="onSubmit">submit</button>
  </form>
</template>


<script>
import firebase from "~/plugins/firebase.js"
import 'firebase/firestore'
export default {
  data() {
    return {
      name: ''
    }
  },
  methods: {
    onSubmit() {
      var db = firebase.firestore()
      db.collection('types').doc('hoge').set({
        name: this.name
      })
    }
  }
}