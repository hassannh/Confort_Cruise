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
    // User has role 0,
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

  <!-- navbar 2 -->

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
      <li
        v-if="
          authStore.user &&
          (authStore.user.role === 1 || authStore.user.role === 2)
        "
      >
        <RouterLink to="/dashboard">
          <a class="flex justify-center pt-3">Admin</a>
        </RouterLink>
      </li>
      <li>
        <RouterLink to="/Booking">
          <a class="flex justify-center pt-3">booking</a>
        </RouterLink>
      </li>
      <li
        class="dropdown flex justify-center pt-3"
        v-if="
          authStore.user &&
          (authStore.user.role === 1 || authStore.user.role === 0)
        "
      >
        <RouterLink to="/tickets">
          <li><a href="#">Tickets</a></li>
        </RouterLink>
      </li>
      <li>
        <a class="flex justify-center pt-3 pb-3" href="/contact">Contact</a>
      </li>
      <li
        v-if="authStore.user"
        class="flex justify-center sm:flex justify-center pt-1"
      >
        <button
          @click="logout"
          class="get-started-btn sign float-right"
          style="width: 120px; padding: 7px"
        >
          Logout
        </button>
      </li>
      <li
        v-else="!authStore.user"
        class="flex justify-center sm:flex justify-center pt-1"
      >
        <RouterLink to="/register">
          <a class="get-started-btn sign">Get Started</a>
        </RouterLink>
      </li>
    </ul>
  </nav>

  <!-- navbar 1 -->

  <div class="hidden sm:block bg-black">
    <div class="flex flex-row justify-around">
      <div>
        <li class="float-left text-yellow-500 font-bold ml-10 pt-7 list-none">
          <RouterLink to="/">CRUISE.T.</RouterLink>
        </li>
      </div>

      <div>
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

                <li
                  class="dropdown"
                  v-if="
                    authStore.user &&
                    (authStore.user.role === 1 || authStore.user.role === 2)
                  "
                >
                  <a href="#">
                    <span>Admin</span> <i class="bi bi-chevron-right"></i>
                  </a>

                  <ul>
                    <RouterLink to="/ports">
                      <li><a href="#">Ports</a></li>
                    </RouterLink>
                    <RouterLink to="/ships">
                      <li><a href="#">Ships</a></li>
                    </RouterLink>
                    <RouterLink to="/companies">
                      <li><a href="#">Companies</a></li>
                    </RouterLink>
                    <RouterLink to="/dashboard">
                      <li><a href="#">Cruises</a></li>
                    </RouterLink>
                  </ul>
                </li>
              </ul>
            </li>
            <RouterLink to="/Contact">
              <li><a class="nav-link scrollto">Contact</a></li>
            </RouterLink>
          </ul>
        </nav>
      </div>

      <div class="mt-3">
        <li
          class="float-right"
          v-if="authStore.user"
          style="
            position: relative;
            right: -40px;
            margin-top: 12px;
            padding-left: 109px;
            list-style: none;
          "
        >
          <button
            @click="logout"
            class="get-started-btn sign float-right"
            style="width: 120px; padding: 7px"
          >
            Logout
          </button>
        </li>
        <li v-else="!authStore.user" class="mt-2">
          <RouterLink to="/register">
            <a class="get-started-btn sign">Get Started</a>
          </RouterLink>
        </li>
      </div>
    </div>
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
