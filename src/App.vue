<template>
  <div id="app">

    <!--Header-->
    <CustomHeader></CustomHeader>
    <!--Header-->

    <div class="container">
      <transition name="bodyTransition" appear>
        <router-view/>
      </transition>
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
</style>

<style lang="scss" scoped>
  .bodyTransition-enter-active, bodyTransition-leave-active {
    -webkit-transition: 1s all;
    -moz-transition: 1s all;
    -ms-transition: 1s all;
    -o-transition: 1s all;
    transition: 1s all;
  }

  .bodyTransition-enter, .bodyTransition-leave-to {
      opacity: 0;
  }
</style>