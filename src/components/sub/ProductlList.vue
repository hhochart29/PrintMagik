<template>
  <div class="product-list">
    <transition appear mode="out-in" name="custom-classes-transition" enter-active-class="animated zoomIn" leave-active-class="animated zoomOut">
      <Loader v-if="loading"></Loader>
      <div v-else class="products row">
        <div class="flipper-container col s12 m6 l4" v-for="product in products.slice(0, limit)">
          <div class="flipper">
            <div class="card front" v-bind:class="{flipped: product.isflipped}">
              <div class="card-content">
                <span class="card-title">{{product.name}}</span>
                <Tilt :image="product.image" class="image-container"></Tilt>
                <div class="card-action row">
                  <div class="price waves-effect waves-light grey darken-4 orange-text btn col s12 m3">
                    {{product.price}}€
                  </div>
                  <div class="more waves-effect waves-light btn-flat col s12 m9 valign-wrapper"
                       @click="flipCard(product)">
                  <span style="vertical-align: top;display: inline-block;">
                    Infos
                  </span>
                    <i class="material-icons">keyboard_arrow_right</i>
                  </div>
                </div>
              </div>
            </div>
            <div class="card back" :class="{flipped: !product.isflipped}">
              <i class="material-icons prefix" @click="flipCard(product)">reply</i>
              <div class="card-content">
                <span class="card-title">{{product.name}}</span>
                <div class="content">
                  <blockquote>
                    {{ product.content }}
                    Ceci est le contenu de l'article permetteant une description brieve
                  </blockquote>
                </div>
                <div class="card-action row">
                  <div class="price waves-effect waves-light grey darken-4 orange-text btn col s12 m3">
                    {{product.price}}€
                  </div>
                  <div class="more waves-effect waves-light btn-flat col s12 m9" @click="addToBasket(product)">
                    Ajouter au panier
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </transition>
  </div>
</template>

<script>
  import Loader from './Loader.vue'
  import axios from 'axios'
  import Tilt from './Tilt.vue'

  export default {
    components: {Loader, Tilt},
    name: 'ProductList',
    data () {
      return {
        products: [],
        loading: false
      }
    },
    props: {
      limit: {
        default: 9999,
        type: Number
      }
    },
    created () {
      this.loading = true
      setTimeout(() => {
        axios.get('/api/controller/product/readAll.php').then(response => {
          response.data.results.forEach((e) => {
            e.isflipped = false
          })
          this.products = response.data.results
          this.loading = false
        }).catch(e => {
          this.errors.push(e)
          console.log(this.errors)
        })
      }, 500)
    },
    methods: {
      flipCard (product) {
        product.isflipped = !product.isflipped
      },
      addToBasket (product) {
        product.uid = this.uniqueID()
        let basket = JSON.parse(localStorage.getItem('basket'))
        basket.push(product)
        localStorage.setItem('basket', JSON.stringify(basket))
        let itemsCount = localStorage.getItem('itemsCount')
        itemsCount++
        localStorage.setItem('itemsCount', itemsCount)
        this.eventHub.$emit('emit', localStorage)
      },
      uniqueID () { // Generate unique key
        return '_' + Math.random().toString(36).substr(2, 9)
      }
    }
  }
</script>

<style scoped lang="scss">
  .more {
    text-align: right;
  }

  .image-container {
    box-shadow: rgba(0, 0, 0, 0.3) 0px 8px 10px -4px;
  }

  .image {
    height: 100px;
    -webkit-background-size: cover;
    background-size: cover;
    background-position: center center;
  }

  .card-action.row {
    padding-bottom: 0;
  }

  .product-row {
    & > * {
      position: relative;
    }
  }

  blockquote {
    border-left-color: orange;
  }

  .flipper {
    position: relative;
    transition: 0.6s;
    transform-style: preserve-3d;
    .card {
      -webkit-transition: all 1.5s;
      -moz-transition: all 1.5s;
      -ms-transition: all 1.5s;
      -o-transition: all 1.5s;
      transition: all 1.5s;
      backface-visibility: hidden;
      &.front {
        -webkit-transform: rotateY(0deg);
        -moz-transform: rotateY(0deg);
        -ms-transform: rotateY(0deg);
        -o-transform: rotateY(0deg);
        transform: rotateY(0deg);
        &.flipped {
          -webkit-transform: rotateY(180deg);
          -moz-transform: rotateY(180deg);
          -ms-transform: rotateY(180deg);
          -o-transform: rotateY(180deg);
          transform: rotateY(180deg);
        }
      }
      &.back {
        backface-visibility: hidden;
        position: absolute;
        left: 0;
        top: 0;
        -webkit-transform: rotateY(0deg);
        -moz-transform: rotateY(0deg);
        -ms-transform: rotateY(0deg);
        -o-transform: rotateY(0deg);
        transform: rotateY(0deg);
        &.flipped {
          -webkit-transform: rotateY(180deg);
          -moz-transform: rotateY(180deg);
          -ms-transform: rotateY(180deg);
          -o-transform: rotateY(180deg);
          transform: rotateY(180deg);
        }
        i {
          position: absolute;
          right: 50px;
          color: white;
          background-color: orange;
          border-radius: 100%;
          padding: 5px;
          top: 23px;
          cursor: pointer;
        }
      }
    }
    .card-title {
      padding-right: 60px;
    }
  }
</style>