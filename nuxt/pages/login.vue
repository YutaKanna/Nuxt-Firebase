<template>
  <div>
    <div>ログイン</div>
    <form @submit.prevent="submit">
      <input type="email" name="email" size="25" v-model="email"/>
      <input type="password" name="password" size="25" v-model="password"/>
      <button
       class="button"
       type="submit"
       @click="submit"
      >submit</button>
    </form>
    <div class="links">
      <button @click="googleLogin">googleでログイン</button>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import firebase from "~/plugins/firebase.js"
import 'firebase/firestore'
import 'firebase/auth';
export default {
    data: function() {
      return {
        email: '',
        password: ''
      }
    },
    methods: {
      submit() {
        firebase.auth().signInWithEmailAndPassword(this.email, this.password)
        .then(this.$router.push('/login-user'));
      },
      googleLogin: function() {
        firebase.auth().signInWithRedirect(new firebase.auth.GoogleAuthProvider())
        .then(this.$router.push('/login-user'));
      }
    }
}
</script>
