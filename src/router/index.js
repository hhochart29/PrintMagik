import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/components/Home'
import Account from '@/components/Account'
import Products from '@/components/Products'
import Product from '@/components/Product'

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/account',
      name: 'account',
      component: Account
    },
    {
      path: '/products',
      name: 'products',
      component: Products
    },
    {
      path: '/product/:id',
      name: 'product',
      component: Product
    }
  ]
})
