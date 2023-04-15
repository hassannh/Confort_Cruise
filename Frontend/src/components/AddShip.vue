<template>
    <div class="p-8 rounded border border-gray-200">
      <h1 class="font-medium text-3xl">Add Ship</h1>
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
              placeholder="Port Name"
              required
            />
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
  
  import { ref } from "vue";
  import axios from "axios";
  
  import { useRouter } from 'vue-router';
  
  let router = useRouter();
  let formData = ref({
    name: ""
  });
  
  
  const Submit = async () => {
   await axios.post("/api/AddShip", formData.value)
      .then((response) => {
        console.log(response.data);
        router.push('/ships');
      })
      .catch((error) => {
        console.error(error);
      });
  };
  
  </script>