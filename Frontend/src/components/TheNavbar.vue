<script setup>
import { RouterLink, RouterView } from "vue-router";
</script>

<template>
  <div class="bg-black">
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
          <RouterLink to="/dashboard">
            <a class="nav-link scrollto">Admin</a>
          </RouterLink>
        </li>
        <li>
          <RouterLink to="/Booking">
            <a class="nav-link scrollto">booking</a>
          </RouterLink>
        </li>
        <li class="dropdown">
          <a href="#">
            <span>Drop Down</span> <i class="bi bi-chevron-down"></i>
          </a>
          <ul>
            <li><a href="#">Tickets</a></li>
            <li class="dropdown">
              <a href="#">
                <span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i>
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
        <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        <li>
          <RouterLink to="/register">
            <a class="get-started-btn sign" style="width: 120px; padding: 7px"
              >Get Started</a
            >
          </RouterLink>
        </li>
    </ul>
    <i class="bi bi-list mobile-nav-toggle" @click="toggleMobileNav">II</i>
</nav>
    <!-- .navbar -->
  </div>
  <RouterView />
</template>

<script>
export default {
  methods: {
    toggleMobileNav() {
      const navbar = document.querySelector('.navbar')
      navbar.classList.toggle('mobile-nav-toggle')
    }
  }
}
</script>

<style>
.backgraund {
  background-image: url("../../public/pictures/fillrouge_backgrouand.png");
  background-repeat: no-repeat;
  background-size: cover;
  width: 100%;
  height: 500px;
}

.mobile-nav-toggle {
  display: none;
  
}

@media (max-width: 500px) {
  .navbar.mobile-nav-toggle {
    display: block;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 9999;
  }

  /* .mobile-nav-toggle {
    display: block;
  } */
}
</style>
