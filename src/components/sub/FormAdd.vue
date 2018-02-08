<template>
  <div>
    <form class="col s12">
      <transition appear mode="out-in" name="custom-classes-transition" enter-active-class="animated zoomIn"
                  leave-active-class="animated slideInLeft">
        <div class="card-panel orange-text grey darken-4" v-if="formReturn"><i class="material-icons">error</i>
          {{ formReturn }}
        </div>
      </transition>

      <div class="row">
        <div class="input-field col s12 valign-wrapper">
          <transition name="iconTransition" appear mode="out-in" enter-active>
            <i key="2" class="material-icons prefix" v-if="errors.has('productTitle')">error</i>
            <i key="1" class="material-icons prefix" v-else>check</i>
          </transition>
          <input id="productTitle" type="text" v-validate="'required'" v-model="productTitle"
                 name="productTitle">
          <label for="productTitle">Titre du produit</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12 valign-wrapper">
          <transition name="iconTransition" appear mode="out-in">
            <i key="2" class="material-icons prefix" v-if="errors.has('productContent')">error</i>
            <i key="1" class="material-icons prefix" v-else>check</i>
          </transition>
          <textarea id="productContent" v-validate="'required'" class="validate materialize-textarea"
                    v-model="productContent" name="productContent"></textarea>
          <label for="productContent">Description du produit</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12 valign-wrapper">
          <transition name="iconTransition" appear mode="out-in">
            <i key="2" class="material-icons prefix" v-if="errors.has('productImage')">error</i>
            <i key="1" class="material-icons prefix" v-else>check</i>
          </transition>
          <input id="productImage" type="text" class="validate" v-validate="'required|url'" v-model="productImage"
                 name="productImage">
          <label for="productImage">Lien de l'image</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12 valign-wrapper">
          <transition name="iconTransition" appear mode="out-in">
            <i key="2" class="material-icons prefix" v-if="errors.has('productPrice')">error</i>
            <i key="1" class="material-icons prefix" v-else>check</i>
          </transition>
          <input id="productPrice" type="number" step="0.01" class="validate" v-validate="'required|decimal:2'"
                 v-model="productPrice" name="productPrice">
          <label for="productPrice">Prix</label>
        </div>
      </div>

      <div class="row row-button">
        <a class="waves-effect waves-light grey darken-4 orange-text btn" v-on:click="submitProduct">Ajouter le
          produit</a>
      </div>
    </form>
  </div>
</template>

<script>
  import axios from 'axios'
  import $ from 'jquery'

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
        if (this.productTitle && this.productContent && this.productImage && this.productPrice !== '') {
          console.log('a product is ready to be submited')
          const params = {
            name: this.productTitle,
            content: this.productContent,
            image: this.productImage,
            price: this.productPrice
          }
          axios.post('api/controller/product/create.php', params).then(response => {
            console.log(response.data)
            if (response.data.created === true) {
              this.eventHub.$emit('sendNotif', 'Votre produit a bien été ajouté')
              $('.collapsible').collapsible('open', 0)
            }
          }).catch(e => {
            this.formReturn = 'Les champs ne sont pas remplis correctement'
            console.log(this.errors)
          })
        } else {
          this.formReturn = 'Veuillez remplir tous les champs'
        }
      }
    }
  }
</script>

<style lang="scss" scoped>

  @import "../../style/labelColors";

</style>