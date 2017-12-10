<template>
  <div>
    <ul class="collapsible" data-collapsible="accordion">
      <li v-for="product in products">
        <div class="collapsible-header">
          <i class="material-icons orange-text">check_circle</i>
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
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aut eos et eum facere labore molestiae officia placeat quam quia sit, velit! Architecto dolorem molestiae nam quia voluptatem? Delectus, eligendi.
            </p>
            <div class="price waves-effect waves-light grey darken-4 orange-text btn col s12 m3">
              {{product.price}}€
            </div>
            <div class="waves-effect waves-light grey darken-4 orange-text btn col s12 m3">
              <i class="material-icons orange-text" @click="editProduct(product.id)">edit</i>
            </div>
            <div class="waves-effect waves-light grey darken-4 orange-text btn col s12 m3">
              <i class="material-icons red-text" @click="deleteProduct(product.id)">clear</i>
            </div>
          </div>
        </div>
      </li>
    </ul>
  </div>
</template>

<script>
  export default {
    name: 'Cart',
    data () {
      return {
        products: JSON.parse(localStorage.basket)
      }
    }
  }
</script>

<style scoped lang="scss">

</style>