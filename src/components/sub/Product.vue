<template>


  <div class="flipper">
    <div class="card front" ref="front" v-bind:class="{flipped: product.isflipped}">
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
    <div class="card back" ref="back" :class="{flipped: !product.isflipped}" :style="{height: customHeight + 'px'}">
      <i class="material-icons prefix" @click="flipCard(product)">reply</i>
      <div class="card-content">
        <span class="card-title">{{product.name}}</span>
        <div class="content">
          <blockquote>
            {{ product.content }}
            Ceci est le contenu de l'article permetteant une description brieve
          </blockquote>
          <div class="card-action row">
            <div class="price waves-effect waves-light grey darken-4 orange-text btn col s12 m3">
              {{product.price}}€
            </div>
            <div class="more waves-effect waves-light btn-flat col s12 m9" @click="addToBasket(product)">
              <span>
                Ajouter au panier
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</template>

<script>
  import Tilt from './Tilt'

  export default {
    components: {Tilt},
    name: 'Product',
    data () {
      return {
        customHeight: 0
      }
    },
    props: {
      product: {
        default: {},
        type: Object
      }
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
        this.eventHub.$emit('sendNotif', 'Votre produit a bien été ajouté au panier')
      },
      uniqueID () { // Generate unique key
        return '_' + Math.random().toString(36).substr(2, 9)
      }
    },
    mounted () {
      this.customHeight = this.$refs.front.clientHeight
    }
  }
</script>

<style scoped lang="scss">
  .more {
    text-align: right;
  }

  .image-container {
    box-shadow: rgba(0, 0, 0, 0.3) 0 8px 10px -4px;
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
      -o-transition: all 1.5s;
      transition: all 1.5s;
      backface-visibility: hidden;
      .card-title {
        font-family: Roboto, serif;
      }
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
        margin: 0;
        -webkit-transform: rotateY(0deg);
        -moz-transform: rotateY(0deg);
        -ms-transform: rotateY(0deg);
        -o-transform: rotateY(0deg);
        transform: rotateY(0deg);
        .card-title {
          padding-right: 60px;
        }
        .card-content {
          position: relative;
          height: 100%;
          .card-action {
            position: absolute;
            bottom: 0;
            left: 24px;
            right: 24px;
            padding: 24px;
          }
        }
        .more.waves-effect {
          padding-right: 0;
          span {
            padding: 0 8px;
            display: inline-block;
            height: 100%;
            border: 2px solid #212121;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
          }
        }
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
          z-index: 999;
          color: white;
          background-color: orange;
          border-radius: 100%;
          padding: 5px;
          top: 23px;
          cursor: pointer;
        }
      }
    }
  }
</style>