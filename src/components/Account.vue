<template>
  <div class="container">
    <Login></Login>
  </div>
</template>

<script>
  import Login from './sub/Login.vue'

  export default {
    components: {Login},
    name: 'Account',
    data () {
      return {}
    }
  }
</script>