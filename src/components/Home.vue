<template>
  <div>
    <p>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. At commodi doloremque expedita, facilis impedit iste saepe voluptatum. Assumenda blanditiis corporis distinctio dolore nesciunt perspiciatis ratione voluptas voluptatem. A dolore, quasi.
    </p>
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