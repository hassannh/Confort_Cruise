<template>
  <div class="p-8 rounded border border-gray-200">
    <h1 class="font-medium text-3xl">Add cruise</h1>
    <!-- <p class="text-gray-600 mt-6">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos dolorem vel cupiditate laudantium dicta.</p> -->
    <form @submit.prevent="Submit">
      <div class="mt-8 grid lg:grid-cols-2 gap-4">
        <div>
          <label for="name" class="text-sm text-gray-700 block mb-1 font-medium"
            >Name</label
          >
          <input
            type="text"
            v-model="formData.name"
            name="name"
            class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"
            placeholder="Cruise name"
            required
          />
        </div>
        <div>
          <label
            for="price"
            class="text-sm text-gray-700 block mb-1 font-medium"
            >Price</label
          >
          <input
            type="number"
            v-model="formData.price"
            class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"
            placeholder="$ OR £ OR DH"
            required
          />
        </div>
        <div>
          <label for="date" class="text-sm text-gray-700 block mb-1 font-medium"
            >Date</label
          >
          <input
            type="date"
            v-model="formData.start_date"
            class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"
            placeholder="--/--/----"
            required
          />
        </div>
        <div>
          <label
            for="picture"
            class="text-sm text-gray-700 block mb-1 font-medium"
            >picture</label
          >
          <input
            type="file"
            accept="image/*"
            class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"
            @change="handleFileUpload"
            :value="formData.picture"
            
            placeholder="Picture"
          />
        </div>
        <div>
          <label
            for="nights"
            class="text-sm text-gray-700 block mb-1 font-medium"
            >Nights</label
          >
          <input
            type="number"
            v-model="formData.nights_number"
            class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"
            placeholder="Nights number"
            required
          />
        </div>
        <div>
          <label
            for="brithday"
            class="text-sm text-gray-700 block mb-1 font-medium"
            >Ship</label
          >
          <select
            v-model="formData.ship_id"
            class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full"
            required
            name="ship"
          >
            <option value="" disabled selected>select ship</option>

            <option
              v-for="elem in shipData"
              :key="elem.id"
              v-bind:value="elem.id"
            >
              {{ elem.name }}
            </option>
          </select>
        </div>
        <div>
          <label
            for="brithday"
            class="text-sm text-gray-700 block mb-1 font-medium"
            >Port</label
          >
          <select
            v-model="formData.port_id"
            class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full"
            required
            name="ports"
          >
            <option value="" disabled selected>select port</option>
            <option v-for="element in portData" :key="element.id" v-bind:value="element.id">
              {{ element.name }}
            </option>
          </select>
        </div>
      </div>

      <div class="space-x-4 mt-8">
        <button
          name="submit"
          type="submit"
          class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600 active:bg-blue-700 disabled:opacity-50"
        >
          Creat
        </button>
        <button
          class="py-2 px-4 bg-white border border-gray-200 text-gray-600 rounded hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50"
        >
          Cancel
        </button>
      </div>
    </form>
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";

let router = useRouter();
const portData = ref([]);
const shipData = ref([]);

onMounted(() => {
  fetchport();
  fetchship();
});

let formData = ref({
  name: "",
  price: "",
  start_date: "",
  picture: "",
  nights_number: "",
  ship_id: "",
  port_id: "",
  pictureFile: null,
});

const Submit = async () => {
  const formDataObj = new FormData();
  formDataObj.append("name", formData.value.name);
  formDataObj.append("price", formData.value.price);
  formDataObj.append("start_date", formData.value.start_date);
  formDataObj.append("nights_number", formData.value.nights_number);
  formDataObj.append("ship_id", formData.value.ship_id);
  formDataObj.append("port_id", formData.value.port_id);
  formDataObj.append("picture", formData.value.pictureFile);
  console.log("formData:", formData.value);

  const response = await axios
    .post("/api/addCruise", formDataObj)
    .then((response) => {
      console.log(response.data);
      router.push({ path: "/dashboard" });
    })
    .catch((error) => {
      console.error(error);
    });
};

// ////////////////////////////////////////////

const handleFileUpload = (e) => {
  formData.value.pictureFile = e.target.files[0]; // set the pictureFile property of formData to the file object
  formData.value.picture = e.target.files[0].name; // set the picture property of formData to the file name
};

// ///////////////////////////////////////////////////////////

const fetchport = async () => {
  // console.log(portData.value);
  await axios
    .get("/api/getPort")
    .then((res) => {
      portData.value = res.data.port;
    })
    .catch((err) => console.log(err));
};

// ///////////////////////////////////////////////////////////////

const fetchship = async () => {
  await axios
    .get("/api/getShipADD")
    .then((result) => {
      shipData.value = result.data.Ship;
    })
    .catch((err) => console.log(err));
};
</script>
