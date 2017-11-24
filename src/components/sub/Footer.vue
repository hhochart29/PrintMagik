<template>

  <footer class="page-footer pink darken-1">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">PrintMagik</h5>
          <p class="grey-text text-lighten-4">
            PrintMagik vous propose un service réactif et de qualité pour toutes vos demandes d'impressions. Demander un devis, suivre une commanden ou encore accéder à vos factures, tout est désormais consultable en ligne.
          </p>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Settings</h5>
          <ul>
            <li>
              <router-link to="account" class="orange-text">Mon Compte</router-link>
            </li>
            <li>
              <router-link to="products" class="orange-text">Produits</router-link>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

</template>


<script>
  export default {
    name: 'CustomFooter'
  }
</script>

<style lang="scss" scoped>

  .container {
    .row {
      margin-bottom: 0;
      .col.l3 {
        float: right;
        text-align: right;
      }
    }
  }

</style>
