<template>



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
          <RouterLink
            to="/companies"
            v-if="
                authStore.user &&(authStore.user.role === 1)"
          >
            <a
              class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded"
              >Companies</a
            >
          </RouterLink>
        </div>



</template>



<script setup>
import { useAuthStore } from "../stores";

let user = null;
const authStore = useAuthStore();
if (authStore) {
  user = authStore.user;

  if (user && typeof user.role === "number") {
    // User has role 0, do something here
  }
} else {
  console.error("Authentication store not found");
}
</script>