<template>
  <div>
    <div class="row">
      <form class="col s12">

        <transition appear mode="out-in" name="custom-classes-transition" enter-active-class="animated zoomIn"
                    leave-active-class="animated zoomOut">
          <div class="card-panel orange-text grey darken-4" v-if="formReturn"><i class="material-icons">error</i>
            {{ formReturn }}
          </div>
        </transition>
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
            <i class="material-icons prefix">lock</i>
            <input id="password" type="password" class="validate" v-model="password">
            <label for="password">Password</label>
          </div>
        </div>

        <div class="row row-button">
          <a class="waves-effect waves-light grey darken-4 orange-text btn" v-on:click="login">Se connecter</a>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
  import axios from 'axios'

  export default {
    name: 'Login',
    data () {
      return {
        user: [],
        email: '',
        formReturn: '',
        password: ''
      }
    },
    methods: {
      login () {
        const params = {
          email: this.email,
          password: this.password
        }
        axios.post('api/controller/user/read.php', params).then(response => {
          this.user = response.data.results[0]
          if (this.user.email.length !== 0) {
            localStorage.setItem('email', this.user.email)
            localStorage.setItem('admin', this.user.isAdmin)
            this.eventHub.$emit('emit', localStorage)
            this.$forceUpdate()
          } else {
            this.formReturn = 'Mauvaise combinaison email / mot de passe'
          }
        }).catch(e => {
          this.formReturn = 'Mauvaise combinaison email / mot de passe'
          console.log(this.errors)
        })
      }
    }
  }
</script>

<style scoped lang="scss">
  .row-button {
    text-align: center;
    a {
      text-align: center;
    }
  }

  .card-panel {
    font-weight: bold;
    i {
      vertical-align: middle;
      display: inline-block;
      padding-right: 10px;
    }
  }

  /* label color */
  .input-field {
    label {
      color: #f57c00 !important;
    }
    input:focus + label {
      color: #f57c00 !important;
    }
    input:focus {
      border-bottom: 1px solid #f57c00 !important;
      box-shadow: 0 1px 0 0 #f57c00 !important;
    }
    input.valid {
      border-bottom: 1px solid #f57c00 !important;
      box-shadow: 0 1px 0 0 #f57c00 !important;
    }
    input.invalid {
      border-bottom: 1px solid #f57c00 !important;
      box-shadow: 0 1px 0 0 #f57c00 !important;
    }
    .prefix.active {
      color: #f57c00 !important;
    }
  }

  .iconTransition-enter-active, iconTransition-leave-active {
    -webkit-transition: 1s all;
    -moz-transition: 1s all;
    -ms-transition: 1s all;
    -o-transition: 1s all;
    transition: 1s all;
  }

  .iconTransition-enter, .iconTransition-leave-to {
    opacity: 0;
  }
</style>