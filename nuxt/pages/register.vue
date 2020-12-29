<template>
  <div>
    <form @submit.prevent="submit">
      <input type="email" name="email" size="25" v-model="email"/>
      <input type="password" name="password" size="25" v-model="password"/>
      <button
       class="button"
       type="submit"
       @click="submit"
      >submit</button>
    </form>
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
        firebase.auth().createUserWithEmailAndPassword(this.email, this.password)
        .then(this.$router.push('/'));
      }
    }
}
</script>