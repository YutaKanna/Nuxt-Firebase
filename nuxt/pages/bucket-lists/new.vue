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

            <!-- <el-form-item label="Trigger">
                <el-checkbox-group v-model="ruleForm.triggers">
                    <el-checkbox label="Just come up"></el-checkbox>
                    <el-checkbox label="Books"></el-checkbox>
                    <el-checkbox label="Youtube"></el-checkbox>
                    <el-checkbox label="By someone else"></el-checkbox>
                </el-checkbox-group>
            </el-form-item> -->

            <el-form-item label="Trigger">
                <el-checkbox v-model="ruleForm.trigger1" label="Just come up"></el-checkbox>
                <el-checkbox v-model="ruleForm.trigger2" label="Books"></el-checkbox>
                <el-checkbox v-model="ruleForm.trigger3" label="Youtube"></el-checkbox>
                <el-checkbox v-model="ruleForm.trigger4" label="By someone else"></el-checkbox>
            </el-form-item>
            <el-form-item label="Publishing" prop="publishing">
                <el-switch v-model="ruleForm.publishing" name="publishing"></el-switch>
            </el-form-item>
            <el-form-item label="Input number">
                <el-input-number v-model="ruleForm.num" :min="1" :max="10"></el-input-number>
            </el-form-item>
            <el-form-item label="Seriousness" prop="seriousness">
                <el-rate v-model="ruleForm.seriousness"></el-rate>
            </el-form-item>
            <el-form-item label="Time limit" prop="date">
                <el-date-picker
                    v-model="ruleForm.date"
                    type="date"
                    placeholder="Pick a day">
                </el-date-picker>
            </el-form-item>
            <el-form-item label="limit" prop="startTime">
                <el-time-select
                    placeholder="Time limit(start)"
                    v-model="ruleForm.startTime"
                    :picker-options="{
                    start: '00:00',
                    step: '1:00',
                    end: '23:00',
                    maxTime: ruleForm.endTime
                    }">
                </el-time-select>
                <el-time-select
                    placeholder="Time limit(end)"
                    v-model="ruleForm.endTime"
                    :picker-options="{
                    start: '00:00',
                    step: '1:00',
                    end: '23:00',
                    minTime: ruleForm.startTime
                    }">
                </el-time-select>
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
          trigger1: false,
          trigger2: false,
          trigger3: false,
          trigger4: false,
          publishing: '',
          num: 1,
          seriousness: null,
          date: '',
          startTime: '',
          endTime: ''
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
          trigger1: [
            { required: true, message: 'Please select Type', trigger: 'change' }
          ],
          trigger2: [
            { required: true, message: 'Please select Type', trigger: 'change' }
          ],
          trigger3: [
            { required: true, message: 'Please select Type', trigger: 'change' }
          ],
          trigger4: [
            { required: true, message: 'Please select Type', trigger: 'change' }
          ],
          publishing: [
            { required: true, message: 'Please select Type', trigger: 'change' }
          ],
          num: [
            { required: true, message: 'Please select Type', trigger: 'change' }
          ],
          seriousness: [
            { required: true, message: 'Please select Type', trigger: 'change' }
          ],
          date: [
            { required: true, message: 'Please select Type', trigger: 'change' }
          ],
          startTime: [
            { required: true, message: 'Please select Type', trigger: 'change' }
          ],
          endTime: [
            { required: true, message: 'Please select Type', trigger: 'change' }
          ],
        }
      };
    },
    methods: {
      postte(formName) {
        this.$refs[formName].validate((valid) => {
          if (valid) {
            console.log(this.ruleForm.triggers);
            const url = "http://localhost:8000/api/bucket-lists/new";
            axiosPost.post(url, {
                title: this.ruleForm.title,
                description: this.ruleForm.description,
                type: this.ruleForm.type,
                gender: this.ruleForm.gender,
                trigger1: this.ruleForm.trigger1,
                trigger2: this.ruleForm.trigger2,
                trigger3: this.ruleForm.trigger3,
                trigger4: this.ruleForm.trigger4,
                publishing: this.ruleForm.publishing,
                num: this.ruleForm.num,
                seriousness: this.ruleForm.seriousness,
                date: this.ruleForm.date,
                startTime: this.ruleForm.startTime,
                endTime: this.ruleForm.endTime,
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
