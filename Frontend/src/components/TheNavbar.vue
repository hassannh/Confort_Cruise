<script setup>
import { RouterLink, RouterView } from "vue-router";
</script>

<template>

  <div class="bg-black" style="height: 50px;" >
    <i class="bi bi-list mobile-nav-toggle float-right my-3 mx-3" @click="toggleMobileNav">
      <li style="list-style-type: none;"><img src="../../public/pictures/togle.svg" alt="toggle"></li></i>
      
      <li class="float-left my-3 mx-3" style="list-style-type: none;">
        <RouterLink class="border border-yellow-500 border-2 py-1 px-2" style="display: none;" to="/register">
          <!-- <div class="get-started-btn absolute p-0 h-fit" > -->
            <button class="relative m-0 p-0"
            >Get Started</button
            >
          <!-- </div> -->
        </RouterLink>
      </li>
  </div>
    
    <div class="bg-black">
    
    <nav class="navbar-2" id="nav-2">
      <ul>
        <RouterLink to="/">
          <li><a class="flex justify-center">Home</a></li>
        </RouterLink>
        <li>
          <RouterLink to="/about">
            <div class="flex justify-center mt-3">About</div>
          </RouterLink>
        </li>
        <li>
          <RouterLink to="/dashboard">
            <a class="flex justify-center mt-3">Admin</a>
          </RouterLink>
        </li>
        <li>
          <RouterLink to="/Booking">
            <a class="flex justify-center mt-3">booking</a>
          </RouterLink>
        </li>
        <li class="dropdown flex justify-center mt-3">
          <ul>
            <RouterLink to="/tickets">
              <li><a href="#">Tickets</a></li>
            </RouterLink>
          </ul>
        </li>
        <li><a class="flex justify-center mt-3" href="#contact">Contact</a></li>
    </ul>
</nav>




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
            <RouterLink to="/tickets">
              <li><a href="#">Tickets</a></li>
            </RouterLink>
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
</nav> 
    
  </div>
  <RouterView />
</template>

<script>
export default {
  methods: {
    toggleMobileNav() {
      const navbar = document.querySelector('#nav-2')
      if (navbar.style.display === "block") {
        navbar.setAttribute("style","display:none")
      } else {
        navbar.setAttribute("style","display:block")
      }
      
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

.navbar-2{
  display: none;
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
