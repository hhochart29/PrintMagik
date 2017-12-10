<template>
  <div>
    <Banner></Banner>
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

<style>

</style>