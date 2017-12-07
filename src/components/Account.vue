<template>
  <div class="container">
    // TODO: ajouter transition sur le composant en scale 1.5
    <MyAccount v-if="email && admin"></MyAccount>
    <Login v-else></Login>
  </div>
</template>

<script>
  import Login from './sub/Login.vue'
  import MyAccount from './sub/MyAccount.vue'

  export default {
    components: {Login, MyAccount},
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