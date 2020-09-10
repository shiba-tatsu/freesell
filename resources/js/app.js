import './bootstrap'
import Vue from 'vue'
import ItemLike from './components/ItemLike'
import './category'
import './item_edit'


const app = new Vue({
  el: '#app',
  components: {
    ItemLike,
  }
})