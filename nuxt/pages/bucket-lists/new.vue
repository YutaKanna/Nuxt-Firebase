<template>
    <section>
        <b-field label="Title">
            <b-input value=""></b-input>
        </b-field>

        <b-field label="Discription">
            <b-input value=""></b-input>
        </b-field>

        <b-field>
            <p class="control">
                <button class="button is-primary">
                  Post
                </button>
            </p>
        </b-field>
    </section>
</template>

<script>
import axios from 'axios';
export default {
    layout: 'app',
}
</script>