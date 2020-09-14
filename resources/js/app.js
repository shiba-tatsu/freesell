import './bootstrap'
import Vue from 'vue'
import ItemLike from './components/ItemLike'
import category from './components/category'
import item_edit from './components/item_edit'
//import './category'
//import './item_edit'


const app = new Vue({
  el: '#app',
  components: {
    ItemLike,
    category,
    item_edit,
  }
})