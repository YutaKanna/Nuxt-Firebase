<template>
  <div class="container">
    <div>
        <el-row :gutter="20">
            <el-col :span="6"><div class="grid-content bg-purple"></div></el-col>
            <el-col :span="6"><div class="grid-content bg-purple"></div></el-col>
            <el-col :span="6"><div class="grid-content bg-purple"></div></el-col>
            <el-col :span="6"><div class="grid-content bg-purple"></div></el-col>
        </el-row>
        <el-form ref="form" :model="form" label-width="120px">
            <el-form-item label="Input">
                <el-input v-model="form.name"></el-input>
            </el-form-item>
            <el-form-item label="Textarea">
                <el-input type="textarea" v-model="form.desc"></el-input>
            </el-form-item>
            <el-form-item label="Select">
                <el-select v-model="form.region" placeholder="please select your zone">
                <el-option label="Zone one" value="shanghai"></el-option>
                <el-option label="Zone two" value="beijing"></el-option>
                </el-select>
            </el-form-item>
            <el-form-item label="Radio">
                <el-radio-group v-model="form.resource">
                <el-radio label="Sponsor"></el-radio>
                <el-radio label="Venue"></el-radio>
                </el-radio-group>
            </el-form-item>
            <el-form-item label="Check box">
                <el-checkbox-group v-model="form.type">
                <el-checkbox label="Online activities" name="type"></el-checkbox>
                <el-checkbox label="Promotion activities" name="type"></el-checkbox>
                <el-checkbox label="Offline activities" name="type"></el-checkbox>
                <el-checkbox label="Simple brand exposure" name="type"></el-checkbox>
                </el-checkbox-group>
            </el-form-item>
            <el-form-item label="Switch">
                <el-switch v-model="form.delivery"></el-switch>
            </el-form-item>
            <el-form-item label="Input number">
                <el-input-number v-model="form.num" @change="handleChange" :min="1" :max="10"></el-input-number>
            </el-form-item>
            <el-form-item label="Rate">
                <el-rate v-model="form.value1"></el-rate>
            </el-form-item>
            <el-form-item label="Date picker">
                <el-date-picker
                    v-model="form.date"
                    type="date"
                    placeholder="Pick a day">
                </el-date-picker>
            </el-form-item>
            <el-form-item label="Time picker">
                <el-time-select
                    placeholder="Start time"
                    v-model="form.startTime"
                    :picker-options="{
                    start: '08:30',
                    step: '00:15',
                    end: '18:30',
                    maxTime: form.endTime
                    }">
                </el-time-select>
                <el-time-select
                    placeholder="End time"
                    v-model="form.endTime"
                    :picker-options="{
                    start: '08:30',
                    step: '00:15',
                    end: '18:30',
                    minTime: form.startTime
                    }">
                </el-time-select>
            </el-form-item>
            <el-form-item>
                <el-button>Cancel</el-button>
                <el-button type="primary" @click="onSubmit">Create</el-button>
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
          name: '',
          region: '',
          date1: '',
          date2: '',
          delivery: false,
          type: [],
          resource: '',
          desc: '',
          num: 1,
          value1: null,
          color1: '#409EFF',
          date: '',
          startTime: '',
          endTime: ''
        }
      }
    },
    methods: {
      async post() {
        const url = "http://localhost:8000/api/bucket-lists/new";
        await axiosPost.post(url, {
          title: this.title,
          description: this.description,
          withCredentials: true,
        }).then(this.$router.push('/bucket-lists'));
      },
      handleChange(value) {
        console.log(value)
      },
      onSubmit() {
        console.log('submit!');
      }
    }
  }
</script>
