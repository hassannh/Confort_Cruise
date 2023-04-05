


<!-- <div class="formReserve ml-6">
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
</div> -->

<template>

<!-- component -->
<!-- Container -->
<div class="flex flex-wrap min-h-screen w-full content-center justify-center bg-gray-200 py-10">
  
  <!-- Login component -->
  <div class="flex shadow-md">
    <!-- Login form -->
    <div class="flex flex-wrap content-center justify-center rounded-l-md bg-white" style="width: 24rem; height: 32rem;">
      <div class="w-72">
        <!-- Heading -->
        <h1 class="text-xl font-semibold">Welcome</h1>
        <small class="text-gray-400">Welcome ! Please Select Your Room Type And Parking Place</small>

        <!-- Form -->
        <form class="mt-4" @submit.prevent="submitReservation" method="POST">

          <input v-model="formData.user_id" type="hidden" name="user_id" >
          <input v-model="formData.cruise_id" type="hidden" name="cruise_id">
          <input v-model="formData.price" type="hidden" name="price">
          <div class="mb-3">
            <label class="mb-2 block text-xs font-semibold">Select Room Type</label>
            <select v-model="formData.room_id" class="block w-full rounded-md border border-gray-300 focus:border-purple-700 focus:outline-none focus:ring-1 focus:ring-purple-700 py-1 px-1.5 text-gray-500" name="room_id">
              <option value="" disabled>roomType</option>
              <option v-for="element in roomData" :key="element.id">{{ element.room_name +' '+ element.room_price }}$</option>
            </select>
          </div>

          <div class="mb-3">
            
            <label class="mb-2 block text-xs font-semibold">Select Parkin Place Number</label>
            <select v-model="formData.parking_id" class="block w-full rounded-md border border-gray-300 focus:border-purple-700 focus:outline-none focus:ring-1 focus:ring-purple-700 py-1 px-1.5 text-gray-500" name="parking_id">
              <option disabled value="">place N:</option>
              <option v-for="ele in parkingData" :key="ele.id">{{ ele.place_number }}</option>
            </select>
          </div>

          <div class="mb-3 flex flex-wrap content-center">
            <input id="remember" type="checkbox" class="mr-1 checked:bg-purple-700" /> <label for="remember" class="mr-auto text-xs font-semibold">Done</label>
          </div>

          <div class="mb-3">
            <button class="mb-1.5 block w-full text-center text-white bg-purple-700 hover:bg-purple-900 px-2 py-1.5 rounded-md">BOOK NOW</button>
           
          </div>
        </form>

        <!-- Footer -->
        <div class="text-center">
          <a href="#" class="text-xs font-semibold text-purple-700">Back</a>
        </div>
      </div>
    </div>

    <!-- Login banner -->
    <div class="flex flex-wrap content-center justify-center rounded-r-md" style="width: 24rem; height: 32rem;">
      <img class="w-full h-full bg-center bg-no-repeat bg-cover rounded-r-md" src="../../public/pictures/order_pic.jpg">
    </div>

  </div>

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


<script setup>
import { ref, onMounted } from "vue";
import axios from 'axios';
import { useAuthStore } from '../stores';

const authstore = useAuthStore();

const roomData = ref([]);
const parkingData = ref([]);



onMounted(() => {
  Parking_place();
  roomType();
});

let formData = ref( {
  user_id: authstore.user.id,
  cruise_id: '',
  room_id: '',
  parking_id: '',
  price: ''
});

const submitReservation = async (formData) => {
    
  await axios.post("api/addReservation" , [formData] )
        .then(response => {
          console.log(response.data);
        })
        .catch(error => {
          console.error(error);
        });
    };


    const roomType = async () => {
      await axios
      .get("/api/getRoom_type")
      .then((res) => {
        roomData.value = res.data.rooms;
        console.log(roomData.value);
        
      })
      .catch((err) => console.log(err));
  };
  
  const Parking_place = async () => {
  
  await axios
    .get("/api/getParking")
    .then((res) => {
      parkingData.value = res.data.Parking;
      console.log(parkingData.value);

    })
    .catch((err) => console.log(err));
};

</script>