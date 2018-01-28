<template>
  <div class="product-list">
    <transition appear mode="out-in" name="custom-classes-transition" enter-active-class="animated zoomIn" leave-active-class="animated zoomOut">
      <Loader v-if="loading"></Loader>
      <div v-else class="products row">
        <div class="flipper-container col s12 m6 l4" v-for="product in products.slice(0, limit)">
          <Product :product="product"></Product>
        </div>
      </div>
    </transition>
  </div>
</template>

<script>
  import Loader from './Loader'
  import Product from './Product'
  import axios from 'axios'
  import Tilt from './Tilt'

  export default {
    components: {Product, Loader, Tilt},
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
    }
  }
</script>

<style scoped lang="scss">

</style>