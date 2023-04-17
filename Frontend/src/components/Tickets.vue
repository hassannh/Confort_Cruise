<template>
  <!-- 1 -->

  <div class="background">
    <div>
      <div
        class="mt-5"
        style="
          margin: 0;
          font-size: 56px;
          font-weight: 700;
          line-height: 64px;
          color: #fff;
          text-align: center;
          font-family: sans-serif;
        "
      >
        <!-- <div class="xl:col-span-6 lg:col-span-8"> -->
        <h1>Booked Tickets Area</h1>
      </div>
      <h2
        style="
          font-size: 26px;
          font-weight: 30;
          line-height: 24px;
          color: #fff;
          text-align: center;
        "
      >
        We are team of talented digital marketers
      </h2>
    </div>
  </div>

  <!-- 2 -->
  <div
    id="content"
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
      <div
        class="w-full md:w-2/3 bg-white flex flex-col space-y-2 p-3 rounded-xl border border-yellow-500"
      >
        <div class="flex justify-between item-center">
          <button
            class="bg-gray-200 px-3 py-1 rounded-full text-xs font-medium text-gray-800 hidden md:block"
            @click="destroy(ticket.id)"
          >
            Cancel
            <!-- <a ></a> -->
          </button>
        </div>
        <h3 class="font-black text-gray-800 md:text-3xl text-xl">
          {{ ticket.cruise_name }}
        </h3>
        <p class="md:text-lg text-gray-500 text-base">
          ¤ Room : {{ ticket.room_id }}<br />¤ start date :
          {{ ticket.cruise_start_date }}
        </p>
        <p class="md:text-lg text-gray-500 text-base">
          ¤ Parking ID : {{ ticket.parking_id }}
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
    <button @click="download">Download PDF</button>
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
import { useAuthStore } from "../stores";
import { useRoute } from "vue-router";
import { useRouter } from 'vue-router';
import jsPDF from "jspdf";


let router = useRouter();
const authstore = useAuthStore();
const route = useRoute();

const tickets = ref([]);

let fetchTickets = async () => {
  const response = await axios.get(`api/tickets/${authstore.user.id}`);
  tickets.value = response.data.reservations;
};

let download = () => {
  const doc = new jsPDF();
  const html = document.getElementById("content");
  doc.html(html, {
    callback: () => {
      doc.save("ticket.pdf");
    },
    x: 15,
    y: 15,
    html2canvas: {
      scale: 0.1,
    },
    margin: [0, 0, 0, 0],
    useCORS: true,
  });
};

const destroy = async (id) => {
  console.log(id);
  const response = await axios.delete(`/api/destroyReservation/${id}`);
  tickets.value = response.data.ticket.data;
  router.push('/tickets')
  console.log(response.data);
};

onMounted(() => {
  fetchTickets();
});
</script>
