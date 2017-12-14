<template>
  <div class="container">
    <Banner h1="Mon compte" :h2="h2"></Banner>
    <transition appear mode="out-in" name="custom-classes-transition" enter-active-class="animated zoomIn"
                leave-active-class="animated zoomOut">
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
        admin: localStorage.admin,
        h2: ''
      }
    },
    created () {
      this.eventHub.$on('emit', localStorageVar => {
        this.email = localStorageVar.email
        this.admin = localStorageVar.admin
        this.checkStatus()
      })
    },
    methods: {
      checkStatus () {
        if (this.admin === '1') {
          this.h2 = 'Ajout et suppressions de produits'
        } else if (this.admin === '0') {
          this.h2 = 'Mes commandes'
        } else {
          this.h2 = 'Connexion'
        }
      }
    },
    mounted () {
      this.checkStatus()
    }
  }
</script>