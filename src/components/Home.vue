<template>
  <div>
    <ProductList></ProductList>
  </div>
</template>

<script>
  import ProductList from './sub/ProductlList.vue'

  export default {
    components: {ProductList},
    name: 'Home',
    data () {
      return {}
    }
  }
</script>