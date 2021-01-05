<template>
  <div>
    <div v-on:click="show" class="button">レビューを書く</div>
    <modal name="hello-world" :resizable="true" height="600">
      <div class="modal-header">
        <h2>レビューを書く</h2>
      </div>
      <div class="modal-body">
            <star-rating  v-model="rating" :show-rating="false" :increment="0.5" padding="4" star-size="68">
            </star-rating>
            <!-- 選択した星の値をhiddenで送信する。「:value="rating"」で値を取得する -->
            <input type="hidden" name="star" :value="rating"/>
            <input class="reviewTitle" id="title" name="title" placeholder="タイトル" ><br>
            <textarea id="item-description" class="reviewBody" rows="5" name="body" placeholder="説明を書く"></textarea>
              
            <div class="reviewModalEnd">
              <div v-on:click="hide" class='btn btn-success reviewModalBtn'>閉じる</div>
              <input type='submit' class='btn btn-primary reviewModalBtn' value='送信する'>
            </div>
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

<style lang="scss">
.modal-header{
  h2{
    font-size: 26px;
    margin:0 auto;
    letter-spacing: 3px;
  }
}
.modal-body{
  margin: 0 40px;
}

.reviewTitle{
  margin-top: 40px;
  width: 470px;
  margin-bottom: 30px;
  height: 30px;
}

.reviewBody{
  resize: none;
  font-size: 18px;
  margin-bottom: 30px;
  color: #666666;
  outline: 0;
  width: 470px;
  height: 250px;
}

.reviewModalEnd{
  display: flex;
  justify-content: space-between;
  margin: 0 8px 2px;
}

.reviewModalBtn{
  width: 200px;
}

</style>