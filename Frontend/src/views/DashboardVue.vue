<template>
  <div class="w-3/4 mx-auto mt-6 mb-6">
    <div class="flex flex-col">
      <h1 class="text-6xl font-extrabold tracking-tighter text-center mb-4">
        Dashboard Controller
      </h1>
      <div class="shadow-md sm:rounded-lg mt-4">
        <div class="gap-3 flex flex-row justify-center mb-5">
          <RouterLink to="/dashboard">
            <a
              class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded"
              >Cruises</a
            >
          </RouterLink>

          <RouterLink to="/ports">
            <a
              class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded"
              >Ports</a
            >
          </RouterLink>

          <RouterLink to="/ships">
            <a
              class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded"
              >Ships</a
            >
          </RouterLink>
          <RouterLink to="/companies">
            <a
              class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded"
              >Companies</a
            >
          </RouterLink>
        </div>

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
                    Cruise Name
                  </th>
                  <th
                    scope="col"
                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400"
                  >
                    start_port
                  </th>
                  <th
                    scope="col"
                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400"
                  >
                    Price
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
                  v-for="cruise in cruises"
                  :key="cruise.id"
                >
                  <td
                    class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white"
                  >
                    {{ cruise.name }}
                  </td>
                  <td
                    class="py-4 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white"
                  >
                  {{ cruise.port_name }}
                  </td>
                  <td
                    class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white"
                  >
                    {{ cruise.price }} $
                  </td>
                  <td
                    class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap"
                  >
                    <button
                      @click="destroy(cruise.id)"
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
    <RouterLink to="/add_cruise">
      <a class="btn btn-sm btn-primary"
        ><i class="fa fa-plus"></i> New Cruise</a
      >
    </RouterLink>

    <!-- <a href="<?= URLROOT ?>Pages/add_port" class="btn btn-sm btn-primary mx-5"><i class="fa fa-plus"></i> New Port</a> -->
    <!-- <a href="<?= URLROOT ?>Pages/add" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> New Ship</a> -->
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
import VuePagination from 'vue-pagination'

const cruises = ref([]);
const fetchData = async () => {
  const response = await axios.get("/api/Admin");
  cruises.value = response.data.cruises;
  console.log(response.data);
};

const destroy = async (id) => {
  console.log(id);
  const response = await axios.delete(`/api/destroyCruise/${id}`);
  cruises.value = response.data.cruise.data;
  console.log(response.data);
  fetchData();
};

onMounted(() => {
  fetchData();
});
</script>
