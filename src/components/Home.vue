<template>
  <div>
    <Banner></Banner>

    <div class="card grey darken-4 orange-text" style="padding: 20px;">
      <div class="card-title white-text">
        Présentation
      </div>
      <div class="card-content">
        Découvrez nos produits à prix et délais ultra compétitifs.
        Fervents défenseurs du made in France, profitez de produits
        de qualité au meilleur prix et d'un service client
        à votre écoute (et dans la bonne humeur).
        <div class="row">
          <div class="col s4" style="text-align: center;">
            <i class="material-icons medium">grade</i><br />
            Des produits de qualité
          </div>
          <div class="col s4" style="text-align: center;">
            <i class="material-icons medium">verified_user</i><br />
            Des transactions sécurisées
          </div>
          <div class="col s4" style="text-align: center;">
            <i class="material-icons medium">layers</i><br />
            Des produits personnalisables
          </div>
        </div>
      </div>
    </div>
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

  .card-title {
    font-size: 35px;
  }

  .card-content {
    font-size: 17px;
    text-align: center;
    .row {
      margin-top: 25px;
      font-family: Typewcond, serif;
      font-size: 20px;
      font-weight: bold;
    }
  }
</style>