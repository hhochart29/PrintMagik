<template>
  <div ref="tilt">
    <div class="image" v-bind:style='{ backgroundImage: "url(" + image + ")" }'></div>
  </div>
</template>

<script>
  import VanillaTilt from 'vanilla-tilt'

  export default {
    name: 'Tilt',
    props: ['image'],
    mounted () {
      const tilt = this.$refs.tilt
      console.log(tilt)
      VanillaTilt.init(tilt, {
        max: 25,
        speed: 400,
        scale: 1.05,
        glare: true,
        transition: true
      })
    }
  }
</script>

<style scoped>
  .image {
    height: 400px;
    -webkit-background-size: cover;
    background-size: cover;
    background-position: center center;
  }
</style>