<template>
  <div class="product-list">
    Quand on clique sur voir le produit, ça fait un transform 3d en flip
    <div v-show="loading" class="loader">
      <Loader></Loader>
    </div>
    <div class="products row">
      <div class="col s12 m6" v-for="product in products">
        <div class="card">
          <div class="card-content" data-tilt data-tilt-max="50" data-tilt-speed="400" data-tilt-perspective="500">
            <span class="card-title">{{product.title}}</span>
            <Tilt :image="product.image"></Tilt>
            <div class="card-action row">
              <router-link :to='{name: "product", params: {id: product.id}}'
                           class="price waves-effect waves-light pink darken-1 btn col s12 m3">
                {{product.price}}€
              </router-link>
              <div class="more waves-effect waves-light btn-flat col s12 m9">Voir le produit</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import axios from 'axios'
  import Loader from './Loader.vue'
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
    created () {
      this.loading = true
      axios.get('/api/controller/product/readAll.php').then(response => {
        this.products = response.data.results
        this.loading = false
      }).catch(e => {
        this.errors.push(e)
        console.log(this.errors)
      })
    }
  }
</script>

<style scoped>
  .more {
    text-align: right;
  }

  .card-action.row {
    padding-bottom: 0;
  }

  .product-list {
    min-height: 400px;
  }
</style>