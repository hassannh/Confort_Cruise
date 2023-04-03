<template>
  <div
    class="flex flex-col justify-center h-screen ml-16"
    v-for="ticket in tickets"
    :key="ticket.id"
  >
    <div
      class="relative flex flex-col md:flex-row md:space-x-5 space-y-3 md:space-y-0 rounded-xl shadow-lg p-3 max-w-xs md:max-w-3xl mx-auto border border-white bg-white"
    >
      <div class="w-full md:w-1/3 bg-white grid place-items-center">
        <img src="" alt="tailwind logo" class="rounded-xl" />
      </div>
      <div class="w-full md:w-2/3 bg-white flex flex-col space-y-2 p-3">
        <div class="flex justify-between item-center">
          <div
            class="bg-gray-200 px-3 py-1 rounded-full text-xs font-medium text-gray-800 hidden md:block"
          >
            <a
              href="<?=URLROOT . 'cruiseController/delete_ticket/' . $reservation->id_reservation ?>"
              >Cancel</a
            >
          </div>
        </div>
        <h3 class="font-black text-gray-800 md:text-3xl text-xl">
          {{ ticket.cruise_id }}
        </h3>
        <p class="md:text-lg text-gray-500 text-base">
          ¤ Room : {{ ticket.room_id }}<br />¤ start date : <br />¤ trajet :
        </p>
        <p class="text-xl font-black text-gray-800">
          price
          <span class="font-normal text-gray-600 text-base"> nights</span>
        </p>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from 'axios';

const tickets = ref([]);

  let fetchTickets = async () => {
        const response = await axios.get('api/tickets/7');
        tickets.value = response.data.reservations;
    }
onMounted(() => {
fetchTickets();
});
</script>
