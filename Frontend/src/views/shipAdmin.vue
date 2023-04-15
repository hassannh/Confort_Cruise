<template>

<!-- 1 -->

<div class="background">
    <div>
      <div
        class="mt-5"  style="
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
        <h1>
          Admin dashboard <br> managment
        </h1>
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
      Ships Managment
      </h2>

      
    </div>
  </div>

<!-- 2 -->
  <div class="w-3/4 mx-auto mt-6 mb-6">
    <div class="flex flex-col">
      <h1 class="text-6xl font-extrabold tracking-tighter text-center mb-4">
        Dashboard Controller
      </h1>
      <div class="shadow-md sm:rounded-lg mt-4">
       

        <controleBar></controleBar>

        <div class="inline-block min-w-full align-middle">
          <div class="overflow-hidden">
            <table
              class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700"
            >
              <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                  <th
                    scope="col"
                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400"
                  >
                    ship ID
                  </th>
                  <th
                    scope="col"
                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400"
                  >
                    ship Name
                  </th>
                  <th
                    scope="col"
                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400"
                  >
                    control
                  </th>
                  <th scope="col" class="p-4">
                    <span class="sr-only">Delete</span>
                  </th>
                </tr>
              </thead>
              <tbody
                class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700"
              >
                <tr
                  class="hover:bg-gray-100 dark:hover:bg-gray-700"
                  v-for="ship in ships"
                  :key="ship.id"
                >
                  <td
                    class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white"
                  >
                    {{ ship.id }}
                  </td>
                  <td
                    class="py-4 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white"
                  >
                    {{ ship.name }}
                  </td>
                  <td
                    class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white"
                  ></td>
                  <td
                    class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap"
                  >
                    <button
                      @click="destroy(ship.id)"
                      class="text-blue-600 dark:text-blue-500 hover:underline"
                    >
                      Delete
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <RouterLink to="/AddShip">
      <a class="btn btn-sm btn-primary mx-5">
        <i class="fa fa-plus"></i> 
        New Port
      </a>
    </RouterLink>
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
import VuePagination from 'vue-pagination'
import controleBar from '../components/controleBar.vue'

    const ships = ref([]);

    const fetchData = async () => {
      const response = await axios.get("/api/getShip");
      ships.value = response.data.Ship.data;
      console.log(response.data);
    };

    const destroy = async (id) => {
        console.log(id);
        const response = await axios.delete(`/api/destroyShip/${id}`);
        ports.value = response.data.Ship.data;
        console.log(response.data);
    }

    onMounted(() => {
      fetchData();
      // console.log(response.data);
    });

</script>


<style>
.background {
  background-image: url("../../public/pictures/ABOUT_backgrouand.png");
  background-repeat: no-repeat;
  background-size: cover;
  width: 100%;
  height: 340px;
}

</style>