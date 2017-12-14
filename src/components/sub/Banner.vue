<template>
  <div class="section no-pad-bot" id="index-banner">
    <h1 class="header center orange-text">{{ h1 }}</h1>
    <!--Transition en flip sur les components-->
    <div class="container">
      <div class="row center">
        <h5 class="header col s12 light">{{ h2 }}</h5>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: 'Banner',
    props: {
      h1: {
        default: 'PrintMagik',
        type: String
      },
      h2: {
        default: 'Impression de flyers sur mesure',
        type: String
      }
    }
  }
</script>

<style lang="scss" scoped>

  #index-banner {
    padding-top: 0;
    .header {
      margin-top: 0;
    }
  }

</style>