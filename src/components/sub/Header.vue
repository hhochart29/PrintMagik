<template>
  <div>
    <nav class="pink darken-1" role="navigation">
      <div class="nav-wrapper container">
        <router-link :to="{name: 'home'}" id="logo-container" class="brand-logo"><img src="../../assets/logo.png"
                                                                                      alt=""></router-link>
        <ul class="right hide-on-med-and-down">
          <li>
            <router-link :to="{name: 'products'}">Produits</router-link>
          </li>
          <li>
            <router-link :to="{name: 'account'}">Mon Compte</router-link>
          </li>
          <li>
            <a v-on:click="logout">Déconnexion</a>
          </li>
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
    methods: {
      showMenu () {
//        $('.button-collapse').sideNav('show')
//        $('#nav-mobile').animate({
//          left: '+300'
//        }, 2000)
        console.log('Burger menu clicked')
      },
      logout () {
        console.log('to be disconnected')
      }
    },
    created () {
//      $('.button-collapse').sideNav({
//        menuWidth: 300, // Default is 300
//        edge: 'right', // Choose the horizontal origin
//        closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
//        draggable: true // Choose whether you can drag to open on touch screens,
//      })
//      $('.button-collapse').sideNav()
    }
  }
</script>

<style scoped lang="scss">
  .router-link-exact-active:not(#logo-container) {
    background-color: darken(#d81b60, 5%);
  }
</style>