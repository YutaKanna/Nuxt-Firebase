<template>
    <div class="container">
        <div class="notification">
            This container is <strong>centered</strong> on desktop.
        </div>
        <div class="culumns">
            <div class="column">
                <div class="card">
                    <div class="card-content">
                        <p class="title">
                        “{{data}}”
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
            <div class="column">
                <div class="card">
                    <div class="card-content">
                        <p class="title">
                        “There are two hard things in computer science: cache invalidation, naming things, and off-by-one errors.”
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
        </div>
    </div>
</template>

<script>
export default {
  layout: 'app',
  async asyncData(app) {
    const data = await app.$axios.$get('http://localhost:8000/api')
    return {
      data
    }
  }
}
</script>