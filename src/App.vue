<template>
  <div id="app">

    <div class="app-container">
      <!--Header-->
      <CustomHeader></CustomHeader>
      <!--Header-->

      <div class="container">
        <transition appear mode="out-in" name="custom-classes-transition" enter-active-class="animated zoomIn"
                    leave-active-class="animated zoomOut">
          <router-view/>
        </transition>
      </div>

    </div>
    <!--Footer-->
    <CustomFooter></CustomFooter>
    <!--Footer-->
  </div>
</template>

<script>
  import CustomHeader from './components/sub/Header'
  import CustomFooter from './components/sub/Footer'

  export default {
    name: 'app',
    components: {CustomHeader, CustomFooter}
  }
</script>

<style lang="scss">
  @import 'style/main';

  body {
    #app {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      .app-container {
        flex-grow: 1;
      }
    }
  }

  footer {
    margin-top: auto;
  }
</style>