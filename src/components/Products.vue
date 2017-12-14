<template>
  <div>
    <Banner h1="Tous nos produits" h2="Flyers, cartes de visite, depliants"></Banner>
    <div class="product-list">
      <ProductList></ProductList>
    </div>
  </div>
</template>

<script>
  import ProductList from './sub/ProductlList.vue'
  import Banner from './sub/Banner.vue'

  export default {
    components: {ProductList, Banner},
    name: 'Products',
    data () {
      return {}
    },
    component: {ProductList}
  }
</script>