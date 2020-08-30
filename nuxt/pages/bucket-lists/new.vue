<template>
    <section>
        <form
            id="app"
            @submit="checkForm"
            action="http://localhost:8000/api/bucket-lists"
            method="post"
        >
            <b-field label="Title">
                <b-input name="title"></b-input>
            </b-field>

            <b-field label="Description">
                <b-input name="description"></b-input>
            </b-field>

            <b-field>
                <p class="control">
                    <button class="button is-primary">
                    Post
                    </button>
                </p>
            </b-field>
        </form>
    </section>
</template>

<script>
import axios from 'axios';
export default {
    layout: 'app',
    data () {
        return {
        email: '',
        password: ''
        }
    },
    methods: {
        goBack () {
            this.$router.push('/')
        }
    }
}
</script>