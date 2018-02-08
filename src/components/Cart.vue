<template>
  <div>
    <Banner h1="Mon panier" h2="Commander & liste des produits"></Banner>
    <transition mode="out-in" name="custom-classes-transition" enter-active-class="animated flipInX"
                leave-active-class="animated flipOutX">
      <ul class="collection" v-if="products.length > 0">
        <transition-group appear mode="out-in" name="slide">
          <li v-for="product in products" class="collection-item avatar" :key="product.id" v-if="!product.isHidden">
            <img :src="product.image" class="circle">
            <span class="title">{{product.name}}</span>
            <p v-html="product.content"></p>
            <div class="chip price dark-text">
              {{product.price}}€
            </div>
            <span class="secondary-content">
                <i class="material-icons red white-text" @click="deleteProduct(product)">clear</i>
              </span>
          </li>
        </transition-group>
        <li class="collection-item avatar total">
          <div class="card">
            <div class="card-content orange-text">
              <span class="card-title">Total du panier : <b>{{total}} €</b></span>
            </div>
            <div class="card-action">
              <div class="more waves-effect grey darken-4 orange-text waves-light btn-flat col s12 m9" @click="order()">
                Valider le panier
                <i class="material-icons orange-text">shopping_cart</i>
              </div>
            </div>
          </div>
        </li>
      </ul>
      <div class="row" v-else>
        <div class="col s12 m12">
          <div class="card grey darken-4">
            <div class="card-content white-text">
              <span class="card-title">Votre panier est vide</span>
            </div>
            <div class="card-action">
              <router-link :to="{name: 'products'}">Parcourir les produits</router-link>
            </div>
          </div>
        </div>
      </div>
    </transition>
  </div>
</template>

<script>
  import Banner from './sub/Banner'
  import $ from 'jquery'

  export default {
    name: 'Cart',
    components: {Banner},
    data () {
      return {
        products: JSON.parse(localStorage.basket),
        total: 0
      }
    },
    methods: {
      deleteProduct (product) {
        for (let i = 0; i < this.products.length; i++) {
          if (this.products[i].uid === product.uid) {
            this.products.splice(i, 1)
            // Localstorage update
            localStorage.setItem('basket', JSON.stringify(this.products))
            let itemsCount = localStorage.getItem('itemsCount')
            itemsCount--
            localStorage.setItem('itemsCount', itemsCount)
            this.eventHub.$emit('emit', localStorage)
            // End Localstorage update
            this.$set(product, 'isHidden', true)
            this.getTotalPrice()
          }
        }
      },
      getTotalPrice () {
        this.total = 0
        this.products.forEach(e => {
          this.total += parseFloat(e.price)
        })
      },
      order () {
        console.log('Order to be validated')
      }
    },
    mounted () {
      $('.collapsible').collapsible()
      this.getTotalPrice()
    }
  }
</script>

<style scoped lang="scss">

  ul {
    overflow: hidden;
    .title {
      font-size: 15px;
      font-weight: bold;
    }
    .collection-item {
      padding-left: 120px !important;
      padding-right: 50px !important;
      .chip {
        min-width: 50px;
        text-align: center;
      }
      .secondary-content {
        display: flex;
        flex-direction: column;
        justify-content: center;
        height: calc(100% - 40px);
        top: 0;
        i {
          cursor: pointer;
          border-radius: 100%;
          padding: 3px;
        }
      }
      .circle {
        height: 80px !important;
        width: 80px !important;
        .material-icons {
          cursor: pointer;
        }
      }
      &.total {
        text-align: center;
        padding: 0 !important;
      }
    }
  }

  .card {
    text-align: center;
    margin: 0;
    .card-content {
      padding: 10px;
      .card-title {
        font-weight: 300;
        font-family: Roboto, serif;
        margin-bottom: 0;
      }
    }
    .more {
      line-height: 2em;
      i {
        vertical-align: middle;
        line-height: 2em;
        margin-left: 5px;
        top: -2px;
        position: relative;
      }
    }
  }

  .slide-leave-to {
    transform: translateX(100%);
  }

  .slide-leave-active {
    transition: transform 1s;
  }

</style>