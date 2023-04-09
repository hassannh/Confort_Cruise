<template>
  <!-- component -->
  <!-- Container -->
  <div
    class="flex flex-wrap min-h-screen w-full content-center justify-center bg-gray-200 py-10"
  >
    <!-- Login component -->
    <div class="flex shadow-md">
      <!-- Login form -->
      <div
        class="flex flex-wrap content-center justify-center rounded-l-md bg-white"
        style="width: 24rem; height: 32rem"
      >
        <div class="w-72">
          <!-- Heading -->
          <h1 class="text-xl font-semibold">Welcome</h1>
          <small class="text-gray-400"
            >Welcome ! Please Select Your Room Type And Parking Place</small
          >

          <!-- Form -->
          <form
            class="mt-4"
            @submit.prevent="submitReservation(formData)"
            method="POST"
          >
            <!-- <input v-model="formData.user_id" type="hidden" name="user_id" > -->
            <input
              v-model="formData.cruise_id"
              type="hidden"
              name="cruise_id"
            />
            <input v-model="formData.price" type="hidden" name="price" />
            <div class="mb-3">
              <label class="mb-2 block text-xs font-semibold"
                >Select Room Type</label
              >
              <select
                v-model="formData.room_id"
                class="block w-full rounded-md border border-gray-300 focus:border-purple-700 focus:outline-none focus:ring-1 focus:ring-purple-700 py-1 px-1.5 text-gray-500"
                name="room_id"
              >
                <option disabled value="">roomType</option>
                <option v-for="element in roomData" :key="element.id">
                  {{ element.room_name + " " + element.room_price }}$
                </option>
              </select>
            </div>

            <div class="mb-3">
              <label class="mb-2 block text-xs font-semibold"
                >Select Parkin Place Number</label
              >
              <select
                v-model="formData.parking_id"
                class="block w-full rounded-md border border-gray-300 focus:border-purple-700 focus:outline-none focus:ring-1 focus:ring-purple-700 py-1 px-1.5 text-gray-500"
                name="parking_id"
              >
                <option disabled value="">place N:</option>
                <option
                  v-for="ele in parkingData"
                  :key="ele.id"
                  :value="ele.id"
                >
                  {{ ele.place_number }}
                </option>
              </select>
            </div>

            <div class="mb-3 flex flex-wrap content-center">
              <input
                id="remember"
                type="checkbox"
                class="mr-1 checked:bg-purple-700"
              />
              <label for="remember" class="mr-auto text-xs font-semibold"
                >Done</label
              >
            </div>

            <div class="mb-3">
              <button
                class="mb-1.5 block w-full text-center text-white bg-purple-700 hover:bg-purple-900 px-2 py-1.5 rounded-md"
              >
                BOOK NOW
              </button>
            </div>
          </form>

          <!-- Footer -->
          <div class="text-center">
            <a href="#" class="text-xs font-semibold text-purple-700">Back</a>
          </div>
        </div>
      </div>

      <!-- Login banner -->
      <div
        class="flex flex-wrap content-center justify-center rounded-r-md"
        style="width: 24rem; height: 32rem"
      >
        <img
          class="w-full h-full bg-center bg-no-repeat bg-cover rounded-r-md"
          src="../../public/pictures/order_pic.jpg"
        />
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
import axios from "axios";
import { useAuthStore } from "../stores";
import { useRoute } from "vue-router";

const authstore = useAuthStore();

const roomData = ref([]);
const parkingData = ref([]);
const cruise = ref(null);
const roomId = ref(null);

onMounted(() => {
  Parking_place();
  roomType();
  fetch_one_cruise();
});

var formData = ref({
  cruise_id: "",
  room_id: "",
  parking_id: "",
  price: ''
});

const route = useRoute();

const submitReservation = async (formData) => {
  try {
    await getRoomId(); // wait for getRoomId to complete
    // console.log(formData.parking_id +"    Test")
    const response = await axios.post(
      "api/addReservation/" + route.query.id,
      formData
    );
    console.log(response.data);
  } catch (error) {
    console.error(error);
  }
};

// formData.value.room_id = roomId.value;

const getRoomId = async () => {
  try {
    const { data } = await axios.get(`/api/getRoom_Id/` + route.query.id);
    roomId.value = data;
    formData.value.room_id = data.roomId;
    console.log(data.roomId);
  } catch (error) {
    console.log(error);
  }
};

const fetch_one_cruise = async () => {
  const { data } = await axios.get("/api/show/" + route.query.id);
  cruise.value = data;
  formData.value.cruise_id = data.id;
  console.log(data.id);
  return data.price;
};

const updateFormData = async () => {
  const price = await fetch_one_cruise();
  formData.value.price = price;
};

updateFormData();

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
