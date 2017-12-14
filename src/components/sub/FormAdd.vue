<template>
  <div>

    <form class="col s12">

      <transition appear mode="out-in" name="custom-classes-transition" enter-active-class="animated zoomIn" leave-active-class="animated slideInLeft">
        <div class="card-panel orange-text grey darken-4" v-if="formReturn"><i class="material-icons">error</i>
          {{ formReturn }}
        </div>
      </transition>

      <div class="row">
        <div class="input-field col s12 valign-wrapper">
          <i key="1" class="material-icons prefix">account_circle</i>
          <input id="productTitle" type="text" v-validate="'required'" v-model="productTitle">
          <label for="productTitle">Email</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12 valign-wrapper">
          <i class="material-icons prefix">lock</i>
          <input id="productContent" type="text" class="validate" v-model="productContent">
          <label for="productContent">Description du produit</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12 valign-wrapper">
          <i class="material-icons prefix">lock</i>
          <input id="productImage" type="text" class="validate" v-model="productImage">
          <label for="productImage">Lien de l'image</label>
        </div>
      </div>

      <div class="row row-button">
        <a class="waves-effect waves-light grey darken-4 orange-text btn" v-on:click="submitProduct">Ajouter le produit</a>
      </div>
    </form>

  </div>
</template>

<script>
  export default {
    name: 'FormAdd',
    data () {
      return {
        productTitle: '',
        productContent: '',
        productImage: '',
        productPrice: '',
        formReturn: ''
      }
    },
    methods: {
      submitProduct () {
        console.log('a product is ready to be submited')
      }
    }
  }
</script>

<style lang="scss" scoped>

  @import "../../style/labelColors";

</style>