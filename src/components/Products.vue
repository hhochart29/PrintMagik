<template>
  <div class="product-list">
    <ProductList></ProductList>
  </div>
</template>

<script>
  import ProductList from './sub/ProductlList.vue'
  export default {
    components: {ProductList},
    name: 'Products',
    data () {
      return {}
    },
    component: { ProductList }
  }
</script>

<style>

</style>