<template>
    <div class="row">
      <div class="col s12 m12">
        <div class="card grey darken-4">
          <div class="card-content white-text">
            <span class="card-title">Vous n'avez aucune commande</span>
          </div>
          <div class="card-action">
            <router-link :to="{name: 'products'}">Parcourir les produits</router-link>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
  export default {
    name: 'Order',
    data () {
      return {}
    }
  }
</script>

<style scoped lang="scss">

</style>