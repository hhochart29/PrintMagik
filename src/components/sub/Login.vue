<template>
  <div>
    <div class="row">
      <form class="col s12">
        <div class="row">
          <div class="input-field col s12 valign-wrapper">
            <transition name="iconTransition" appear mode="out-in">
              <i key="2" class="material-icons prefix" style="color: orange;" v-if="errors.has('email')">error</i>
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
          <a class="waves-effect waves-light orange darken-1 btn" v-on:click="login">Se connecter</a>
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
          console.log(response)
          this.user = response.data.results
        }).catch(e => {
          this.errors.push(e)
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

  /* label color */
  .input-field {
    label {
      color: orange;
    }
    input[type=text]:focus + label {
      color: orange;
    }
    input[type=text]:focus {
      border-bottom: 1px solid orange;
      box-shadow: 0 1px 0 0 orange;
    }
    input[type=text].valid {
      border-bottom: 1px solid orange;
      box-shadow: 0 1px 0 0 orange;
    }
    input[type=text].invalid {
      border-bottom: 1px solid orange;
      box-shadow: 0 1px 0 0 orange;
    }
    .prefix.active {
      color: orange;
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