<template>
  <div class="container">
    <div>
        <!-- <el-row :gutter="20">
            <el-col :span="6"><div class="grid-content bg-purple"></div></el-col>
            <el-col :span="6"><div class="grid-content bg-purple"></div></el-col>
            <el-col :span="6"><div class="grid-content bg-purple"></div></el-col>
            <el-col :span="6"><div class="grid-content bg-purple"></div></el-col>
        </el-row> -->
        <el-form ref="form" :model="form" label-width="120px" method="post" action="http://localhost:8000/api/bucket-lists/new" @submit.native.prevent="postte">
            <el-form-item label="Title*">
                <el-input name="title" v-model="form.title"></el-input>
            </el-form-item>
            <el-form-item label="Description*">
                <el-input name="description" type="textarea" v-model="form.description"></el-input>
            </el-form-item>
            <el-form-item label="type">
                <el-select name="type" v-model="form.type" placeholder="select the type of bucket list">
                    <el-option label="Business" value="1"></el-option>
                    <el-option label="Sport" value="2"></el-option>
                    <el-option label="Hubby" value="3"></el-option>
                    <el-option label="Other" value="4"></el-option>
                </el-select>
            </el-form-item>
            <el-form-item label="Gender">
                <el-radio v-model="form.gender" label="1">Man</el-radio>
                <el-radio v-model="form.gender" label="2">Woman</el-radio>
                <el-radio v-model="form.gender"　label="3">None</el-radio>
            </el-form-item>
            <el-form-item label="Publishing">
                <el-switch v-model="form.publishing" name="publishing"></el-switch>
            </el-form-item>
            <el-form-item>
                <el-button>Cancel</el-button>
                <el-button type="primary" native-type="submit">Submit!</el-button>
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
import axios from 'axios';
var axiosPost = axios.create({
  xsrfHeaderName: "X-XSRF-TOKEN",
  withCredentials: true
})
  export default {
    data: function() {
      return {
        form: {
          title: '',
          description: '',
          type: '',
          gender: '',
          publishing: '',
          num: 1,
          seriousness: '',
          date: '',
          startTime: '',
          endTime: ''
        }
      }
    },
    methods: {
      async postte() {
        const url = "http://localhost:8000/api/bucket-lists/new";
        await axiosPost.post(url, {
          title: this.form.title,
          description: this.form.description,
          type: this.form.type,
          gender: this.form.gender,
          publishing: this.form.publishing,
          withCredentials: true,
        }).then(this.$router.push('/bucket-lists'));
      },
    }
  }
</script>
