<template>
  <div
    class="flex flex-col justify-center h-screen ml-16"
    v-for="ticket in tickets"
    :key="ticket.id"
  >
    <div
      class="relative flex flex-col md:flex-row md:space-x-5 space-y-3 md:space-y-0 rounded-xl shadow-lg p-3 max-w-xs md:max-w-3xl mx-auto border border-black bg-white"
    >
      <div
        class="w-full md:w-1/3 bg-white grid place-items-center rounded-xl border border-yellow-500"
      >
        <img :src="'../../public/pictures/' + ticket.cruise_picture" />
      </div>
      <div class="w-full md:w-2/3 bg-white flex flex-col space-y-2 p-3 rounded-xl border border-yellow-500">
        <div class="flex justify-between item-center">
          <div
            class="bg-gray-200 px-3 py-1 rounded-full text-xs font-medium text-gray-800 hidden md:block"
          >
            <a
              href=""
              >Cancel</a
            >
          </div>
        </div>
        <h3 class="font-black text-gray-800 md:text-3xl text-xl">
          {{ ticket.cruise_name }}
        </h3>
        <p class="md:text-lg text-gray-500 text-base">
          ¤ Room : {{ ticket.room_id }}<br />¤ start date :
          {{ ticket.cruise_start_date }}
        </p>
        <p class="text-xl font-black text-gray-800">
          price
          {{ ticket.price }}$ <br />
          <span class="font-normal text-gray-600 text-base"
            >{{ ticket.nights_number }} nights</span
          >
        </p>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
import { useAuthStore } from '../stores';
import  {useRoute} from 'vue-router'

const authstore = useAuthStore();
const route = useRoute();

const tickets = ref([]);

let fetchTickets = async () => {
  const response = await axios.get(`api/tickets/${authstore.user.id}`);
  tickets.value = response.data.reservations;
};

onMounted(() => {
  fetchTickets();
});
</script>
