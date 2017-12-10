<template>
  <div>
    <Banner></Banner>

    <!--<div class="card grey darken-4 orange-text" style="padding: 20px;">
      <div class="card-title white-text">
        Présentation
      </div>
      <div class="card-content">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi beatae debitis deserunt dolorum eaque eligendi, eveniet fuga, fugit in incidunt, iure laboriosam libero omnis praesentium quaerat ratione repellendus repudiandae saepe!
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi beatae debitis deserunt dolorum eaque eligendi, eveniet fuga, fugit in incidunt, iure laboriosam libero omnis praesentium quaerat ratione repellendus repudiandae saepe!
      </div>
    </div>-->
  <h3>Nos meilleurs ventes</h3>
  <ProductList :limit=3></ProductList>
  </div>
</template>

<script>
  import ProductList from './sub/ProductlList.vue'
  import Banner from './sub/Banner.vue'

  export default {
    components: {ProductList, Banner},
    name: 'Home',
    data () {
      return {}
    }
  }
</script>

<style scoped lang="scss">
  h3 {
    text-align: center;
  }
</style>