<template>
  <div>
    <nav class="grey darken-4" role="navigation">
      <div class="nav-wrapper container">
        <router-link :to="{name: 'home'}" id="logo-container" class="brand-logo"><img src="../../assets/logo.png"
                                                                                      alt=""></router-link>
        <ul class="right hide-on-med-and-down">
          <li>
            <router-link :to="{name: 'products'}" class="orange-text">Produits</router-link>
          </li>
          <li v-if="user.email">
            <router-link :to="{name: 'account'}" class="orange-text">Mon Compte</router-link>
          </li>

          <transition mode="out-in" appear name="custom-classes-transition" enter-active-class="animated zoomIn" leave-active-class="animated zoomOut">
            <li v-if="user.email" key="a"><a v-on:click="logout" class="orange-text">Déconnexion</a></li>
            <li v-else key="b"><router-link :to="{name: 'account'}" class="orange-text">Connexion</router-link></li>
          </transition>
        </ul>

        <ul id="nav-mobile" class="side-nav">
          <li>
            <router-link :to="{name: 'products'}">Produits</router-link>
          </li>
          <li>
            <router-link :to="{name: 'account'}">Mon Compte</router-link>
          </li>
        </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse" v-on:click="showMenu"><i class="material-icons">menu</i></a>
      </div>
      <li class="username">
        {{ user.email }}
      </li>
    </nav>
    <div class="section no-pad-bot" id="index-banner">
      <h1 class="header center orange-text">PrintMagik</h1>
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light">Impression, print & Flyers sur mesure</h5>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  //  import $ from 'jquery'
  export default {
    name: 'CustomHeader',
    data () {
      return {
        user: localStorage
      }
    },
    methods: {
      showMenu () {
        console.log('Burger menu clicked')
      },
      logout () {
        if (this.user.email !== 0) {
          console.log('User ' + this.user.email + ' has been disconnected')
          this.user.clear()
          this.$router.push({name: 'home'})
          this.user = ''
        }
      }
    },
    created: function () {
      this.eventHub.$on('emit', localStorageVar => {
        this.user = localStorageVar
      })
    }

  }
</script>

<style scoped lang="scss">
  .router-link-exact-active:not(#logo-container) {
    background-color: lighten(black, 20%);
  }

  .username {
    position: absolute;
    top: 0;
    right: 3%;
    list-style-type: none;
  }
</style>