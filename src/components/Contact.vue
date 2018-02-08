<template>
  <div>
    <Banner h1="Contactez-nous" h2="Une demande ? un devis ? N'hesitez pas a nous contacter"></Banner>

    <form class="col s12">
      <transition appear mode="out-in" name="custom-classes-transition" enter-active-class="animated zoomIn"
                  leave-active-class="animated slideInLeft">
        <div class="card-panel orange-text grey darken-4" v-if="formReturn"><i style="vertical-align: middle;" class="material-icons">error</i>
          {{ formReturn }}
        </div>
      </transition>

      <div class="row">
        <div class="input-field col s12 valign-wrapper">
          <transition name="iconTransition" appear mode="out-in" enter-active>
            <i key="2" class="material-icons prefix" v-if="errors.has('messageTitle')">error</i>
            <i key="1" class="material-icons prefix" v-else>check</i>
          </transition>
          <input id="messageTitle" type="text" v-validate="'required'" v-model="messageTitle"
                 name="messageTitle">
          <label for="messageTitle">Titre de votre message</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12 valign-wrapper">
          <transition name="iconTransition" appear mode="out-in">
            <i key="2" class="material-icons prefix" v-if="errors.has('email')">error</i>
            <i key="1" class="material-icons prefix" v-else>account_circle</i>
          </transition>
          <input id="email" name="email" type="email" v-validate="'required|email'" v-model="email"
                 :class="{'input': true, 'is-danger': errors.has('email') }">
          <label for="email">Email</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12 valign-wrapper">
          <transition name="iconTransition" appear mode="out-in">
            <i key="2" class="material-icons prefix" v-if="errors.has('messageContent')">error</i>
            <i key="1" class="material-icons prefix" v-else>check</i>
          </transition>
          <textarea id="messageContent" v-validate="'required'" class="validate materialize-textarea"
                    v-model="messageContent" name="messageContent"></textarea>
          <label for="messageContent">Votre message</label>
        </div>
      </div>

      <div class="row row-button">
        <a class="waves-effect waves-light grey darken-4 orange-text btn" v-on:click="submitMessage">Envoyer votre
          message</a>
      </div>
    </form>

  </div>
</template>

<script>
  import Banner from './sub/Banner'

  export default {
    name: 'Contact',
    components: {Banner},
    data () {
      return {
        messageTitle: '',
        messageContent: '',
        email: '',
        formReturn: ''
      }
    },
    methods: {
      submitMessage () {
        if (this.messageTitle.length !== 0 && this.messageContent.length !== 0 && this.email.length !== 0) {
          this.formReturn = 'Votre message a bien été envoyé'
        } else {
          this.formReturn = 'Veuillez remplir tous les champs'
        }
      }
    }
  }
</script>

<style scoped lang="scss">

  /* Label colors */
  @import "../style/labelColors";

</style>