<template>



<div class="formReserve ml-6">
  <form class="ReserveForm" @submit.prevent="reserveCruise" method="POST">
    <input type="hidden" name="id_cruise" :value="data.cruise.ID_cruise">

    <label for="Price">cruise price</label>
    <input type="text" readonly name="Price" :value="data.cruise.price + ' DH'">

    <label for="id_roomType_price">room type</label>

    <select name="id_roomType_price" v-model="reservationData.id_roomType_price" required>
      <option disabled value="">room type</option>
      <option v-for="roomType in data.roomType" :value="roomType.id + ' ' + roomType.price">
        {{ roomType.name }}:{{ roomType.price }} $
      </option>
    </select>

 
    <label for="port">Port 1</label>
    <select name="port" v-model="reservationData.port">
      <option disabled value="">ports</option>
      <option v-for="port in data.ports" :value="port.id">
        {{ port.name }}
      </option>
    </select>

    <div class="reserveSubmit">
      <button type="submit" class="btn bnt primary">book Now</button>
    </div>
  </form>
</div>





</template>


<style>
  .formReserve {
    display: flex;
    justify-content: center;
    margin-top: 30px;
  }

  .ReserveForm {
    display: flex;
    flex-direction: column;
    gap: 20px;
    background-color: burlywood;
    padding: 30px;
    border-radius: 15px;
  }

  .reserveSubmit {
    display: flex;
    justify-content: center;
  }
</style>


<script>

import { ref, onMounted } from 'vue';
import axios from 'axios';

export default {
   setup() {
      const order = ref([]);
      const data = ref([]);

      const reserveCruise = async () => {
         const response = await axios.get('http://localhost/Fill_Rouge/backend/cruiseController/order',{'id':121});
         console.log(order.value);
         order = response.data;
      };


      onMounted(() => {
        reserveCruise();
         console.log(order.value);
      });

      const reservationData = ref({
        id_roomType_price: "",
        trajet: "",
        port: "",
      });

      return { order ,reservationData ,data};

   },
};
</script>