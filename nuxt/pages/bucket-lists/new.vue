<template>
  <div class="container">
    <div>
        <el-form ref="ruleForm" :model="ruleForm" :rules="rules" label-width="120px" method="post" action="http://localhost:8000/api/bucket-lists/new" @submit.native.prevent="postte('ruleForm')">
            <el-form-item label="Title" prop="title">
                <el-input name="title" v-model="ruleForm.title"></el-input>
            </el-form-item>
            <el-form-item label="Description" prop="description">
                <el-input name="description" type="textarea" v-model="ruleForm.description"></el-input>
            </el-form-item>
            <el-form-item label="type" prop="type">
                <el-select name="type" v-model="ruleForm.type" placeholder="select the type of bucket list">
                    <el-option label="Business" value="1"></el-option>
                    <el-option label="Sport" value="2"></el-option>
                    <el-option label="Hubby" value="3"></el-option>
                    <el-option label="Other" value="4"></el-option>
                </el-select>
            </el-form-item>
            <el-form-item label="Gender" prop="gender">
                <el-radio v-model="ruleForm.gender" label="1">Man</el-radio>
                <el-radio v-model="ruleForm.gender" label="2">Woman</el-radio>
                <el-radio v-model="ruleForm.gender"　label="3">None</el-radio>
            </el-form-item>
            <el-form-item label="Publishing" prop="publishing">
                <el-switch v-model="ruleForm.publishing" name="publishing"></el-switch>
            </el-form-item>
            <el-form-item label="Time limit" prop="date">
                <el-date-picker
                    v-model="ruleForm.date"
                    type="date"
                    placeholder="Pick a day">
                </el-date-picker>
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
        ruleForm: {
          title: '',
          description: '',
          type: '',
          gender: '',
          publishing: '',
          date: '',
        },
        rules: {
          title: [
            { required: true, message: 'Please input Title', trigger: 'blur' }
          ],
          description: [
            { required: true, message: 'Please input Description', trigger: 'blur' }
          ],
          type: [
            { required: true, message: 'Please select Type', trigger: 'change' }
          ],
          gender: [
            { required: true, message: 'Please select Type', trigger: 'change' }
          ],
          publishing: [
            { required: true, message: 'Please select Type', trigger: 'change' }
          ],
          date: [
            { required: true, message: 'Please select Type', trigger: 'change' }
          ],
        }
      };
    },
    methods: {
      postte(formName) {
        this.$refs[formName].validate((valid) => {
          if (valid) {
            const url = "http://localhost:8000/api/bucket-lists/new";
            axiosPost.post(url, {
                title: this.ruleForm.title,
                description: this.ruleForm.description,
                type: this.ruleForm.type,
                gender: this.ruleForm.gender,
                publishing: this.ruleForm.publishing,
                date: this.ruleForm.date,
                withCredentials: true,
            }).then(this.$router.push('/bucket-lists'));
          } else {
            console.log('error submit!!');
            return false;
          }
        });
      },
    }
  }
</script>
