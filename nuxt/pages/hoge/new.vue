<template>
    <div class="container">
        <el-form ref="form" :model="form" method="postte" action="http://localhost:8000/api/hoge/new" @submit.native.prevent="postte">
            <el-form-item>
                <el-input v-model="form.name"></el-input>
            </el-form-item>
            <el-upload
                action="#"
                list-type="picture-card"
                :on-change="handleAdd"
                :auto-upload="false">
                    <i slot="default" class="el-icon-plus"></i>
                    <div slot="file" slot-scope="{file}">
                    <img
                        class="el-upload-list__item-thumbnail"
                        :src="file.url" alt=""
                    >
                    <span class="el-upload-list__item-actions">
                        <span
                        class="el-upload-list__item-preview"
                        @click="handlePictureCardPreview(file)"
                        >
                        <i class="el-icon-zoom-in"></i>
                        </span>
                        <span
                        v-if="!form.disabled"
                        class="el-upload-list__item-delete"
                        @click="handleRemove(file)"
                        >
                        <i class="el-icon-delete"></i>
                        </span>
                    </span>
                    </div>
            </el-upload>
            <el-dialog :visible.sync="form.dialogVisible">
                <img width="100%" :src="form.dialogImageUrl" alt="">
            </el-dialog>
            <el-form-item>
                <el-button type="primary" native-type="submit">Submit</el-button>
                <el-button>Cancel</el-button>
            </el-form-item>
        </el-form>
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
  .avatar-uploader .el-upload {
    border: 1px dashed #d9d9d9;
    border-radius: 6px;
    cursor: pointer;
    position: relative;
    overflow: hidden;
  }
  .avatar-uploader .el-upload:hover {
    border-color: #409EFF;
  }
  .avatar-uploader-icon {
    font-size: 28px;
    color: #8c939d;
    width: 178px;
    height: 178px;
    line-height: 178px;
    text-align: center;
  }
  .avatar {
    width: 178px;
    height: 178px;
    display: block;
  }
</style>

<script>
import axios from 'axios';
var axiosPost = axios.create({
  xsrfHeaderName: "X-XSRF-TOKEN",
  withCredentials: true
})
let url = '/api/hoge/new';
  export default {
    data: function() {
      return {
        form: {
            name: '',
            dialogImageUrl: '',
            dialogVisible: false,
            disabled: false
        }
      }
    },
    methods: {
      handleRemove(file) {
        console.log(file);
      },
      handlePictureCardPreview(file) {
        console.log(file);
        this.form.dialogImageUrl = file.url;
        this.form.dialogVisible = true;
      },
      handleAdd: function (file, dialogImageUrl) {
        this.form.dialogImageUrl = dialogImageUrl
      },
      async postte() {
        const url = "http://localhost:8000/api/hoge/new";
        console.log(this.form.dialogImageUrl);
        await axiosPost.post(url, {
          name: this.form.name,
          withCredentials: true,
        }).then(this.$router.push('/hoge'));
      },
    }
  }
</script>