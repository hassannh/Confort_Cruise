<script setup>
import { RouterLink, RouterView } from "vue-router";
import { useAuthStore } from "../stores";

function logout() {
  const authStore = useAuthStore();
  if (authStore) {
    authStore.logout();
  } else {
    console.error("Authentication store not found");
  }
}

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

function toggleMobileNav() {
  const navbar = document.querySelector("#nav-2");
  if (navbar.style.display === "block") {
    navbar.setAttribute("style", "display:none");
  } else {
    navbar.setAttribute("style", "display:block");
  }
}
</script>

<template>
  <div class="sm:hidden bg-black px-6 py-6">
    <i class="mobile-nav-toggle float-right" @click="toggleMobileNav">
      <li style="list-style-type: none" class="pb-6">
        <img src="../../public/pictures/togle.svg" alt="toggle" />
      </li>
    </i>

    <li>
      <RouterLink to="/" class=""> CRUISE.T. </RouterLink>
    </li>
  </div>

  <nav class="navbar-2 bg-black" id="nav-2">
    <ul>
      <li class="pt-3">
        <RouterLink to="/">
          <div class="flex justify-center">Home</div>
        </RouterLink>
      </li>
      <li>
        <RouterLink to="/about">
          <div class="flex justify-center pt-3">About</div>
        </RouterLink>
      </li>
      <li>
        <RouterLink to="/dashboard">
          <a class="flex justify-center pt-3">Admin</a>
        </RouterLink>
      </li>
      <li>
        <RouterLink to="/Booking">
          <a class="flex justify-center pt-3">booking</a>
        </RouterLink>
      </li>
      <li class="dropdown flex justify-center pt-3">
        <RouterLink to="/tickets">
          <li><a href="#">Tickets</a></li>
        </RouterLink>
      </li>
      <li>
        <a class="flex justify-center pt-3 pb-3" href="#contact">Contact</a>
      </li>
      <li>
        <RouterLink to="/register" class="flex justify-center pb-3">
          <i class="get-started-btn"> Get Started </i>
        </RouterLink>
      </li>
    </ul>
  </nav>





  <div class="hidden sm:block bg-black">
    <li class="float-left text-yellow-500 font-bold ml-10 pt-7 list-none" >
      <RouterLink to="/">CRUISE.T.</RouterLink>
    </li>
    <nav class="navbar">
      <ul>

        <RouterLink to="/">
          <li><a class="nav-link scrollto">Home</a></li>
        </RouterLink>
        <li>
          <RouterLink to="/about">
            <div class="nav-link scrollto">About</div>
          </RouterLink>
        </li>
        <li
          v-if="
            authStore.user &&
            (authStore.user.role === 1 || authStore.user.role === 2)
          "
        >
          <RouterLink to="/dashboard">
            <a class="nav-link scrollto">Admin</a>
          </RouterLink>
        </li>
        <li>
          <RouterLink to="/Booking">
            <a class="nav-link scrollto">booking</a>
          </RouterLink>
        </li>
        <li
          class="dropdown"
          v-if="
            authStore.user &&
            (authStore.user.role === 1 ||
              authStore.user.role === 2 ||
              authStore.user.role === 0)
          "
        >
          <a href="#">
            <span>Options</span> <i class="bi bi-chevron-down"></i>
          </a>
          <ul>
            <RouterLink to="/tickets">
              <li><a href="#">Tickets</a></li>
            </RouterLink>
            <li class="dropdown">
              <a href="#">
                <span>Admin</span> <i class="bi bi-chevron-right"></i>
              </a>
              <ul>
                <li><a href="#">Deep Drop Down 1</a></li>
                <li><a href="#">Deep Drop Down 2</a></li>
                <li><a href="#">Deep Drop Down 3</a></li>
                <li><a href="#">Deep Drop Down 4</a></li>
                <li><a href="#">Deep Drop Down 5</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <RouterLink to="/Contact">
          <li><a class="nav-link scrollto">Contact</a></li>
        </RouterLink>
      </ul>
      <li v-if="authStore.user" style="position: relative;right: -40px; margin-top: 12px; padding-left: 109px; list-style: none;">
        <button
          @click="logout"
          class="get-started-btn sign float-right"
          style="width: 120px; padding: 7px"
        >
          Logout
        </button>
      </li>
      <li v-else="!authStore.user" style="position: relative;right: -40px; margin-top: 12px; padding-left: 109px; list-style: none;">
        <RouterLink to="/register">
          <a class="get-started-btn sign" style="width: 120px; padding: 7px"
            >Get Started</a
          >
        </RouterLink>
      </li>
    </nav>
  </div>
  <RouterView />
</template>

<style>

.navbar-2 {
  display: none;
}

.mobile-nav-toggle {
  display: none;
}
</style>
