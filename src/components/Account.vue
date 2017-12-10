<template>
  <div class="container">
    <Banner></Banner>
    <transition appear mode="out-in" name="custom-classes-transition" enter-active-class="animated zoomIn" leave-active-class="animated zoomOut">
      <MyAccount v-if="email && admin"></MyAccount>
      <Login v-else></Login>
    </transition>
  </div>
</template>

<script>
  import Login from './sub/Login.vue'
  import MyAccount from './sub/MyAccount.vue'
  import Banner from './sub/Banner.vue'

  export default {
    components: {Login, MyAccount, Banner},
    name: 'Account',
    data () {
      return {
        email: localStorage.email,
        admin: localStorage.admin
      }
    },
    created () {
      this.eventHub.$on('emit', localStorageVar => {
        this.email = localStorageVar.email
        this.admin = localStorageVar.admin
      })
    }
  }
</script>