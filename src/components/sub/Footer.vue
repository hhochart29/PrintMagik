<template>
  <footer class="page-footer grey darken-4">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="orange-text">PrintMagik</h5>
          <p class="grey-text text-lighten-4">
            PrintMagik vous propose un service réactif et de qualité pour toutes vos demandes d'impressions. Demander un devis, suivre une commanden ou encore accéder à vos factures, tout est désormais consultable en ligne.
          </p>
        </div>
        <div class="col l3 s12">
          <h5 class="orange-text">Settings</h5>
          <ul>
            <li>
              <router-link to="account" class="white-text">
                <i class="material-icons">keyboard_arrow_right</i>
                <span style="vertical-align: top;display: inline-block;">
                Mon Compte
                </span>
              </router-link>
            </li>
            <li>
              <router-link to="products" class="white-text">
                <i class="material-icons">keyboard_arrow_right</i>
                <span style="vertical-align: top;display: inline-block;">
                  Produits
                </span>
              </router-link>
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
