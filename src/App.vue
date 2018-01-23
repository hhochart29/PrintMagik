<template>
  <div id="app">

    <div class="app-container">
      <!--Header-->
      <CustomHeader></CustomHeader>
      <!--Header-->

      <Notifications></Notifications>
      <div class="container">
        <transition appear mode="out-in" name="custom-classes-transition" enter-active-class="animated fadeInLeft" leave-active-class="animated fadeOutRight">
          <router-view/>
        </transition>
      </div>

    </div>
    <!--Footer-->
    <!--<CustomFooter></CustomFooter>-->
    <!--Footer-->
  </div>
</template>

<script>
  import CustomHeader from './components/sub/Header'
  import CustomFooter from './components/sub/Footer'
  import Notifications from './components/Notifications'

  export default {
    name: 'app',
    components: {CustomHeader, CustomFooter, Notifications}
  }
</script>

<style lang="scss">
  @import 'style/main';

  body {
    overflow-x: hidden;
    #app {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      .app-container {
        flex-grow: 1;
        &> .container {
          margin-left: 100px;
          padding: 20px 50px;
          width: calc(100% - 100px);
          max-width:none;

        }
      }
    }
  }

  footer {
    margin-top: auto;
  }
</style>