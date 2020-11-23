<template>
  <div>
    <div v-on:click="show" class="button">商品を削除する</div>
    <modal name="hello-world" :resizable="true" :width="500" :height="300">
      <div class="modal-body">
        <h6>商品を削除します。よろしいですか？</h6>
          <div type="submit">はい</div>
          <div v-on:click="hide">閉じる</div>
      </div>  
    </modal>
  </div>
</template>

<script>

export default {
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