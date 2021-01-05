<template>
  <div>
    <p ref="pppp" class="pppp" id="pppp">画像投稿(10枚まで投稿が可能です)</p>
    <div v-if="data.ListLength == 0">
      <div class="form-group testform row" ref="testform">
        <label class="testdesuyo col-6">
          ラベル
          <input type="file" ref="file" name="img[]" @change="setImage" multiple style='display: none;' />
          <input type="file" ref="hiddfile" name="image[]" multiple="multiple" style='display: none;'>
        </label>
      </div>
    </div>
    <!--<div v-else-if="data.ListLength == 1">
      <div class="form-group testform row">
        <label class="testdesuyo col-6">
          ラベル
          <input type="file" ref="file" name="img[]" @change="setImage" multiple style='display: none;' />
          <input type="file" ref="hiddfile" name="image[]" multiple="multiple" style='display: none;'>
        </label>
        <img :src="data.image" class="imgimg col-6 px-2 py-4 justify-content-end">
      </div>
    </div>-->

    <!--<div v-else-if="data.ListLength <= 4">
      <div class="form-group testform">
        <div class="row testRrr">
          <div v-for="bitai in data.ImList" class="col-3">
            <img :src="bitai" class="bitaimg" style="height: 30px; width: 30px;">
          </div>
        </div>
        <label class="testdesu row">
          ラベル
          <input type="file" ref="file" name="img[]" @change="setImage" multiple style='display: none;' />
          <input type="file" ref="hiddfile" name="image[]" multiple="multiple" style='display: none;'>
        </label>
        
      </div>
    </div>-->

    <div v-else-if="data.ListLength == 1">
      <div class="form-group testform row">
        <label class="testdesuyo col-6">
          ラベル
          <input type="file" ref="file" name="img[]" @change="setImage" multiple style='display: none;' />
          <input type="file" ref="hiddfile" name="image[]" multiple="multiple" style='display: none;'>
        </label>
        <div class="imgimg col-6 px-2 py-4 justify-content-end" :style="{ backgroundImage: 'url(' +data.image+ ')', }"></div>
        <!--<div class="imgimg col-6 px-2 py-4 justify-content-end" v-bind:style="[ backGround ]"></div>-->
      </div>
    </div>

    <div v-else-if="data.ListLength <= 4">
      <div class="form-group testform">
        <!--<div class="column">
          <div v-for="bitai in data.ImList" :key="bitai.ind" class="col-3">
            <div class="bitaimg" :style="{ backgroundImage: 'url('+data.image+')', }"></div>
          </div>
        </div>-->
        <label class="testdesuyo column" style="background-position: bottom right,
      left,
      right;">
          ラベル
          <input type="file" ref="file" name="img[]" @change="setImage" multiple style='display: none;' />
          <input type="file" ref="hiddfile" name="image[]" multiple="multiple" style='display: none;'>
        </label>
      </div>
    </div>

  </div>
</template>
<script>
let list = [];
let imgList = [];

export default {
  data() {
    return {
      data: {
        image: "",
        name: "",
        ListLength: 0,
        ImList: [],
        //testzya: [1,2,4,5]
      }
    };
  },
  methods: {
    setImage(e) {
      const files = this.$refs.file;
      const fileImg = files.files[0];
      if (fileImg.type.startsWith("image/")) {
        this.data.image = window.URL.createObjectURL(fileImg);
        this.data.name = fileImg.name;
        this.data.type = fileImg.type;
        imgList.push(this.data.image)
      }
      list.push(fileImg)
      this.data.ListLength = list.length;

      // new DataTransfer()が safari 未対応のためか、safariでは実行不可能。
      // chrome か firefox では確認済み。

      if(list.length === 1){
        let dt = new DataTransfer();
        dt.items.add(fileImg); // 必要なだけ繰り返す
        let dtlist = dt.files;
        this.$refs.hiddfile.files = dtlist;
      }else {
        let dt = new DataTransfer();
        list.forEach(function( tltl, ind){
          dt.items.add(tltl)
        })
        let dtlist = dt.files;
        this.$refs.hiddfile.files = dtlist;
        this.data.ImList = imgList
        this.data.ImList.forEach(function(Im, i){
        })
      }
    },
  }
};
</script>

<style scoped>
.testform{
  background-color:silver;
}
.testdesuyo {
  height: 400px;
  width:100%;
}
.imgimg{
  max-width: 300px;
  height: auto;
}
.testimage{
  
}
.bitaimg{
  max-width: 100%;
  height: auto;
}
.pppp{
  font-size: 20px;
  
}
.testdesu{
  height: 200px;
  width:100%;
}
.testRrr{
  height: 200px;
  width:100%;
}
</style>