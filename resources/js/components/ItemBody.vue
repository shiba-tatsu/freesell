<template>
  <div class="show mb-5">
    
  </div>
</template>

<script>
export default {
  mounted() {
      axios.get('/users').then(response => console.log(response)) 
  },

}
</script>