<template>
    <div class="container">
        <div class="notification">
            This container is <strong>centered</strong> on desktop.
        </div>
        <div class="culumns">
            <template v-for="bucketList in bucketLists">
                <div class="column">
                    <div class="card" :key="bucketList.id">
                        <div class="card-content">
                            <p class="title">
                            “{{ bucketList.title }}”
                            </p>
                            <p class="subtitle">
                            Jeff Atwood
                            </p>
                        </div>
                        <footer class="card-footer">
                            <p class="card-footer-item">
                            <span>
                                View on <a href="https://twitter.com/codinghorror/status/506010907021828096">Twitter</a>
                            </span>
                            </p>
                            <p class="card-footer-item">
                            <span>
                                Share on <a href="#">Facebook</a>
                            </span>
                            </p>
                        </footer>
                    </div>
                </div>
            </template>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {
  layout: 'app',
  async asyncData({ $axios }) {
    const response = await $axios.$get("http://localhost:8000/bucket-lists")
        .catch( error => {
        console.log("response error", error)
        return false
        })
    return { bucketLists: response.bucketLists }
  }
}
</script>