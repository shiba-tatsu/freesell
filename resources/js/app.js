import './bootstrap'

import Vue from 'vue'

import StarRating from 'vue-star-rating';
import VModal from 'vue-js-modal'

import ItemLike from './components/ItemLike'
import category from './components/category'
import item_edit from './components/item_edit'
import review_modal from './components/review_modal'
import ImageForm from './components/ImageForm'
import ItemBody from './components/ItemBody'

Vue.component('star-rating', StarRating);
Vue.use(VModal);
//import './category'
//import './item_edit'


const app = new Vue({
  el: '#app',
  components: {
    ItemLike,
    category,
    item_edit,
    review_modal,
    ImageForm,
    ItemBody,
  }
})

/*
let star = new Vue({
  el: '#star', 
  data: {
  rating: 1 
  }
  });
*/