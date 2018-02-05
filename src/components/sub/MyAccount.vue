<template>

  <div>
    <ul ref="collapsible" class="collapsible" data-collapsible="accordion">
      <li>
        <div class="collapsible-header grey lighten-5">
          <i class="material-icons green-text">add_circle</i>
          Ajouter un nouvel article
        </div>
        <div class="collapsible-body">
          <p>
            <FormAdd></FormAdd>
          </p>
        </div>
      </li>
      <transition-group mode="out-in" name="shrink">
        <li v-for="product in products" v-if="!product.isHidden" :key="product.id">
          <div class="collapsible-header">
            <i class="material-icons orange-text">check_circle</i>
            <span style="margin-right:15px"><b>ID : </b>{{ product.id }}</span>
            <span>
            {{ product.name}}
          </span>
          </div>
          <div class="collapsible-body row">
            <div class="col m6 s12">
              <div class="image"
                   style="height:200px; background-position: center center; -webkit-background-size: cover;background-size: cover;"
                   v-bind:style='{ backgroundImage: "url(" + product.image + ")" }'></div>
            </div>
            <div class="col m6 s12">
              <p>{{ product.description}}
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aut eos et eum facere labore molestiae
                officia placeat quam quia sit, velit! Architecto dolorem molestiae nam quia voluptatem? Delectus,
                eligendi.
              </p>
              <div class="price waves-effect waves-light grey darken-4 orange-text btn col s12 m3">
                {{product.price}}€
              </div>
              <div class="waves-effect waves-light grey darken-4 orange-text btn col s12 m3">
                <i class="material-icons orange-text" @click="editProduct(product.id)">edit</i>
              </div>
              <div @click="deleteProduct(product)" class="waves-effect waves-light grey darken-4 orange-text btn col s12 m3">
                <i class="material-icons red-text">clear</i>
              </div>
            </div>
          </div>
        </li>
        </transition-group>
    </ul>
  </div>

</template>

<script>
  import axios from 'axios'
  import FormAdd from './FormAdd.vue'
  import $ from 'jquery'

  export default {
    name: 'MyAccount',
    components: {FormAdd},
    data () {
      return {
        products: [],
        loading: false
      }
    },
    methods: {
      deleteProduct (product) {
        const params = {
          id: product.id
        }
        axios.post('/api/controller/product/delete.php', params).then(response => {
          this.$set(product, 'isHidden', true)
        }).catch(e => {
          this.errors.push(e)
          console.log(this.errors)
        })
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
    },
    mounted () {
      $('.collapsible').collapsible()
      $('.collapsible span').collapsible()
    }
  }
</script>

<style lang="scss" scoped>

  .row {
    margin-bottom: 0;
  }

  ul.collapsible {
    overflow: hidden;
    li {
      position: relative;
      overflow: hidden;
    }
    .waves-effect {
      margin: 0 10px;
    }
  }

  .shrink-leave-to {
    -webkit-transform: scaleY(0);
    -moz-transform: scaleY(0);
    -ms-transform: scaleY(0);
    -o-transform: scaleY(0);
    transform: scaleY(0);
  }

  .shrink-leave-active {
    transition: transform 1s;
  }
</style>