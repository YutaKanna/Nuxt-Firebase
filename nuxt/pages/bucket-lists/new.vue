<template>
  <div class="container">
    <div>
        <!-- <el-row :gutter="20">
            <el-col :span="6"><div class="grid-content bg-purple"></div></el-col>
            <el-col :span="6"><div class="grid-content bg-purple"></div></el-col>
            <el-col :span="6"><div class="grid-content bg-purple"></div></el-col>
            <el-col :span="6"><div class="grid-content bg-purple"></div></el-col>
        </el-row> -->
        <el-form ref="form" :model="form" label-width="120px" method="post" action="http://localhost:8000/api/bucket-lists/new">
            <el-form-item label="Title*">
                <el-input name="title" v-model="form.title"></el-input>
            </el-form-item>
            <el-form-item label="Description*">
                <el-input name="description" type="textarea" v-model="form.description"></el-input>
            </el-form-item>
            <el-form-item label="label">
                <el-select v-model="value" placeholder="select the type of bucket list">
                    <el-option
                      v-for="item in form.options"
                      :key="item.value"
                      :label="item.label"
                      :value="item.value">
                    </el-option>
                </el-select>
            </el-form-item>
            <el-form-item label="Gender">
                <el-radio-group v-model="form.gender">
                <el-radio label="Man" value="1"></el-radio>
                <el-radio label="Woman" value="2"></el-radio>
                <el-radio label="None" value="3"></el-radio>
                </el-radio-group>
            </el-form-item>
            <el-form-item label="Trigger">
                <el-checkbox v-model="form.trigger1" label="Just come up" name="trigger1"></el-checkbox>
                <el-checkbox v-model="form.trigger2" label="Books" name="trigger2"></el-checkbox>
                <el-checkbox v-model="form.trigger3" label="Youtube" name="trigger3"></el-checkbox>
                <el-checkbox v-model="form.trigger4" label="By someone else" name="trigger4"></el-checkbox>
            </el-form-item>
            <el-form-item label="Publishing">
                <el-switch v-model="form.publishing"></el-switch>
            </el-form-item>
            <el-form-item label="Input number">
                <el-input-number v-model="form.num" @change="handleChange" :min="1" :max="10"></el-input-number>
            </el-form-item>
            <el-form-item label="Seriousness">
                <el-rate v-model="form.seriousness"></el-rate>
            </el-form-item>
            <el-form-item label="Time limit">
                <el-date-picker
                    v-model="form.date"
                    type="date"
                    placeholder="Pick a day">
                </el-date-picker>
            </el-form-item>
            <el-form-item label="limit(start・end)">
                <el-time-select
                    placeholder="Time limit(start)"
                    v-model="form.startTime"
                    :picker-options="{
                    start: '00:00',
                    step: '1:00',
                    end: '23:00',
                    maxTime: form.endTime
                    }">
                </el-time-select>
                <el-time-select
                    placeholder="Time limit(end)"
                    v-model="form.endTime"
                    :picker-options="{
                    start: '00:00',
                    step: '1:00',
                    end: '23:00',
                    minTime: form.startTime
                    }">
                </el-time-select>
            </el-form-item>
            <el-form-item>
                <el-button>Cancel</el-button>
                <el-button type="primary" @click="onSubmit">Submit!</el-button>
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
          options: [{
            value: '1',
            label: 'Business'
            }, {
            value: '2',
            label: 'Sport'
            }, {
            value: '3',
            label: 'Hubby'
            }, {
            value: '4',
            label: 'Other'
          }],
          value: '',
          gender: '',
          trigger1: '',
          trigger2: '',
          trigger3: '',
          trigger4: '',
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
        console.log('submit!');
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
        this.postte()
      }
    }
  }
</script>
