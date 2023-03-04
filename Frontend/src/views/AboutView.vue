<template>
  <div class="about">
    <h1>This is an about page</h1>
  </div>
</template>

<style>
@media (min-width: 1024px) {
  .about {
    min-height: 100vh;
    display: flex;
    align-items: center;
  }
}
</style>
<!-- <script>

import { ref, onMounted } from 'vue';
import axios from 'axios';

export default {
  
   setup() {
      const items = ref([]);

      const fetchData = async () => {
         const response = await axios.get('');
         items.value = response.data;
      };


      onMounted(() => {
         fetchData();
      });

      return { items };

   },
};
</script> -->
