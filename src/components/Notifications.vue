<template>
  <transition appear mode="out-in" name="custom-classes-transition" enter-active-class="animated bounceInDown" leave-active-class="animated bounceOut">
    <div class="top-notif card-panel orange-text grey darken-4" v-if="show"><i class="material-icons">check</i>
      {{ message }}
    </div>
  </transition>
</template>

<script>
  export default {
    name: 'Notifications',
    data () {
      return {
        message: '',
        show: false
      }
    },
    created () {
      this.eventHub.$on('sendNotif', message => {
        this.show = true
        this.message = message
        setTimeout(() => {
          this.show = false
        }, 3000)
      })
    }
  }
</script>

<style>

  .top-notif {
    position: fixed;
    top: 2%;
    left: 10%;
    padding: 25px 50px;
  }

</style>