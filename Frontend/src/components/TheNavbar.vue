<script setup>
import { RouterLink, RouterView } from 'vue-router'
</script>



<template>
    <div class="bg-black  ">

        <nav class="navbar">

            <ul>

                <RouterLink to="/">
                    <li><a class="nav-link scrollto active">Home</a></li>
                </RouterLink>
                <li>
                    <RouterLink to="/about">
                        <div class="nav-link scrollto">About</div>
                    </RouterLink>
                </li>
                <li>
                    <RouterLink to="/Admin"><a class="nav-link scrollto">Admin</a></RouterLink>
                </li>
                <li>
                    <RouterLink to="/"><a class="nav-link scrollto ">Portfolio</a></RouterLink>
                </li>
                <li>
                    <RouterLink to="/"><a class="nav-link scrollto" href="#team">Team</a></RouterLink>
                </li>
                <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="#">Drop Down 1</a></li>
                        <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                            <ul>
                                <li><a href="#">Deep Drop Down 1</a></li>
                                <li><a href="#">Deep Drop Down 2</a></li>
                                <li><a href="#">Deep Drop Down 3</a></li>
                                <li><a href="#">Deep Drop Down 4</a></li>
                                <li><a href="#">Deep Drop Down 5</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Drop Down 2</a></li>
                        <li><a href="#">Drop Down 3</a></li>
                        <li><a href="#">Drop Down 4</a></li>
                    </ul>
                </li>
                <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                <i class="bi bi-list mobile-nav-toggle"></i>
                <RouterLink to="/login">
                    <a href="#" class="get-started-btn sign" style="width: 120px;
                                                    padding: 7px;">Get Started</a>
                </RouterLink>
            </ul>
        </nav><!-- .navbar -->

    </div>

    <RouterView />
</template>

<style>
.backgraund {
    background-image: url("../../public/pictures/fillrouge_backgrouand.png");
    background-repeat: no-repeat;
    background-size: cover;
    width: 100%;
    height: 500px;
}
</style>



