<template>
  <div>
    <label class="imageFile">
      <input type="file" ref="inputFile" @change="setImage">
    </label>
  </div>
</template>

<script>
export default {
  data() {
    return {
      data: {
        image: '',
      }
    };
  },
  methods: {
    setImage(e) {
      const files = this.$refs.inputFile;
      const fileImg = files.files[0];
      console.log(files);
      console.log(fileImg);
      let fileReader = new FileReader();
      fileReader.readAsDataURL(fileImg);
      fileReader.onload = () => console.log(fileReader.result);
    },
  }
};
</script>