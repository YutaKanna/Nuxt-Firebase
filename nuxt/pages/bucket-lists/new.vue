<template>
    <form>
        <b-field label="Title">
            <b-input name="title"></b-input>
        </b-field>

        <b-field label="Description">
            <b-input name="description"></b-input>
        </b-field>

        <b-field>
            <p class="control">
                <button @click="addData">Click</button>
            </p>
        </b-field>
    </form>
</template>


<script>
import axios from 'axios';
let url = "http://localhost:8000/api/bucket-lists";
export default {
    data: function(){
        return {
            title:'',
            description:'',
        };
    },
    methods: {
        addData: function() {
            alert("hello world!");
        },
    },
}
</script>
