<template>
  <div>
    <nav class="grey darken-4" role="navigation">
      <div class="nav-wrapper container">
        <router-link :to="{name: 'home'}" id="logo-container" class="brand-logo"><img src="../../assets/logo.png"
                                                                                      alt=""></router-link>
        <ul class="right hide-on-med-and-down">
          <transition-group mode="out-in" appear name="custom-classes-transition" enter-active-class="animated zoomIn" leave-active-class="animated zoomOut">
            <li key="1">
              <router-link :to="{name: 'products'}" class="orange-text">
                <i class="material-icons grey darken-4">grid_on</i>
                <span class="hover grey darken-4 white-text">
                Produits
              </span>
              </router-link>
            </li>
            <li key="2" v-if="user.email">
              <router-link :to="{name: 'cart'}" class="orange-text grey darken-4">
                <i class="material-icons" ref="basket">shopping_cart</i>
                <span class="hover grey darken-4 white-text">
                  Mon Panier
                </span>
                <span class="item-number" ref="basketCount">
                  {{ basketCount }}
                </span>
              </router-link>
            </li>
            <li key="3" v-if="user.email">
              <router-link :to="{name: 'account'}" class="orange-text">
                <i class="material-icons grey darken-4">account_circle</i>
                <span class="hover grey darken-4 white-text">
                  Mon Compte
                </span>
              </router-link>
            </li>
            <li key="4">
              <router-link :to="{name: 'contact'}" class="orange-text">
                <i class="material-icons grey darken-4">question_answer</i>
                <span class="hover grey darken-4 white-text">
                Contact
              </span>
              </router-link>
            </li>
            <li key="5" v-if="user.email">
              <a v-on:click="logout" class="orange-text"><i class="material-icons grey darken-4">remove_circle</i></a>
              <span class="hover grey darken-4 white-text">
                Se déconnecter
              </span>
            </li>
            <li key="6" v-else>
              <router-link :to="{name: 'account'}" class="orange-text">
                <i class="material-icons grey darken-4">account_circle</i>
                <span class="hover grey darken-4 white-text">
                  Se connecter
                </span>
              </router-link>
            </li>
          </transition-group>
        </ul>
      </div>
    </nav>
  </div>
</template>

<script>
  export default {
    name: 'CustomHeader',
    data () {
      return {
        user: localStorage,
        tooltip: false,
        basketCount: localStorage.itemsCount
      }
    },
    methods: {
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
        this.basketCount = localStorageVar.itemsCount
        this.$forceUpdate()
      })
      this.eventHub.$on('productAdded', () => {
        this.$refs.basket.classList.add('tada')
        setTimeout(() => {
          this.$refs.basket.classList.remove('tada')
        }, 1000)
      })
    }
  }
</script>

<style scoped lang="scss">
  nav {
    position: fixed;
    left: 0;
    height: 100%;
    width: 100px;
    z-index: 999;
    box-shadow: 3px 0px 7px 0px rgba(0, 0, 0, 0.43);
    .container {
      margin: 0;
      width: 100%;
    }
    #logo-container {
      height: auto;
      position: relative;
      width: 100%;
      padding: 15%;
      z-index: 2;
      img {
        height: auto;
        width: 100%;
      }
    }
    ul {
      text-align: center;
      float: none !important;
      height: 100%;
      position: fixed;
      top: 0;
      width: 100px;
      display: flex;
      justify-content: center;
      flex-direction: column;
      z-index: 1;
      li {
        position: relative;
        width: 100%;
        &:hover .hover {
          left: 100px;
          -webkit-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.45);
          -moz-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.45);
          box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.45);
        }
        & > a {
          padding: 0;
        }
        span {
          position: relative;
          padding: 0 15px;
          &.item-number {
            position: absolute;
            right: 5px;
            font-weight: bold;
            top: 5px;
          }
          &.hover {
            -webkit-transition: 0.5s all ease-in-out;
            -moz-transition: 0.5s all ease-in-out;
            -ms-transition: 0.5s all ease-in-out;
            -o-transition: 0.5s all ease-in-out;
            transition: 0.5s left ease-in-out;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            text-align: center;
            padding: 5px 10px;
            width: 100px;
            z-index: -1;
            line-height: 1em;
            display: flex;
            align-items: center;
            justify-content: center;
          }
        }
      }
    }
  }

  .router-link-exact-active:not(#logo-container) {
    background-color: lighten(black, 20%);
  }

  @keyframes tada {
    from {
      transform: scale3d(1, 1, 1);
    }

    10%,
    20% {
      transform: scale3d(0.5, 0.5, 0.5) rotate3d(0, 0, 1, -10deg);
    }

    30%,
    50%,
    70%,
    90% {
      transform: scale3d(2.5, 2.5, 2.5) rotate3d(0, 0, 1, 10deg);
    }

    40%,
    60%,
    80% {
      transform: scale3d(2.5, 2.5, 2.5) rotate3d(0, 0, 1, -10deg);
    }

    to {
      transform: scale3d(1, 1, 1);
    }
  }

  .tada {
    animation: tada 1s normal;
  }
</style>