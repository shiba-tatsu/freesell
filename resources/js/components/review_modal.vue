<template>
  <div>
    <div v-on:click="show" class="button">show!</div>
    <modal name="hello-world" :resizable="true">
      <div class="modal-header">
        <h2>Modal title</h2>
      </div>
      <div class="modal-body">
            <star-rating v-model="rating" :show-rating="false" :increment="0.5">
            </star-rating>
            <!-- 選択した星の値をhiddenで送信する。「:value="rating"」で値を取得する -->
            <input type="hidden" name="star" :value="rating"/>
            <input id="title" name="title" placeholder="商品名">
            <textarea id="item-description" rows="5" name="body" placeholder="test"></textarea>
            
                                
            <input type='submit' class='btn btn-primary' value='星レビュー'>
          <div v-on:click="hide">閉じる</div>
      </div>  
    </modal>
  </div>
</template>

<script>

export default {
  
  data: function(){
    return {
      rating: 1
    }
  },
  methods: {
    show : function() {
      this.$modal.show('hello-world');
    },
    hide : function () {
      this.$modal.hide('hello-world');
    },
  }
}
</script>