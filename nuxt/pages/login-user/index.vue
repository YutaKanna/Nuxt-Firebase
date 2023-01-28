<template>
  <div>
    <section class="container">
      <div>name: {{user.displayName}}</div>
      <div>email: {{user.email}}</div>
      <button @click="logout">ログアウト</button>
    </section>
  </div>
</template>

<script>
import axios from 'axios';
import firebase from "~/plugins/firebase.js"
import 'firebase/firestore'
import 'firebase/auth';
export default {
    data() {
      return {
        user: ''
      }
    },
    mounted() {
        firebase.auth().onAuthStateChanged(user => {
            if (user) {
                var user = firebase.auth().currentUser;
                this.user = user
            } else {
                this.$router.push('/login')
            }
        })
    },
    methods: {
      logout() {
        firebase.auth().signOut()
      }
    }
}
</script>