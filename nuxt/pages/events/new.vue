<template>
  <div class="container">
    <div>
        <el-form ref="form" :model="form" label-width="120px" method="post" @submit.native.prevent="onSubmit">
            <el-form-item label="Name*">
                <el-input name="name" v-model="form.name"></el-input>
            </el-form-item>
            <el-form-item>
                <el-button type="primary" native-type="submit">保存する</el-button>
            </el-form-item>
        </el-form>
    </div>
  </div>
</template>

<style>
.container {
  margin: 0 auto;
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
}
.el-row {
margin-bottom: 20px;
    &:last-child {
        margin-bottom: 0;
    }
}
.el-col {
    border-radius: 4px;
}
.bg-purple-dark {
    background: #99a9bf;
}
.bg-purple {
    background: #d3dce6;
}
.bg-purple-light {
    background: #e5e9f2;
}
.grid-content {
    border-radius: 4px;
    min-height: 36px;
}
.row-bg {
    padding: 10px 0;
    background-color: #f9fafc;
}
</style>

<script>
import firebase from "~/plugins/firebase.js"
import 'firebase/firestore'
export default {
  data: function() {
    return {
      form: {
        name: ''
      }
    }
  },
  methods: {
    onSubmit() {
      var docData = {
        name: this.form.name
      };
      var db = firebase.firestore()
      db.collection('events').add(docData)
    }
  }
}
</script>