<template>
  <div class="flex justify-around mt-5 mb-5 sm:flex flex-wrap px-6 py-6">
    <div class="ml-8">
      <h1 class="font-bold text-yellow-500">OUR SERVICES</h1>
      <br />
      <ul class="">
        <li>#- booking places</li>
        <br />
        <li>#- booking parking places</li>
        <br />
        <li>#- free food</li>
        <br />
        <li>#- free drink</li>
        <br />
        <li>#- wonderful parties</li>
        <br />
        <li>#- booking room</li>
      </ul>
    </div>

    <div
      class="max-w-md mx-4 rounded-md border border-gray-300 p-4"
      style="width: 270px"
    >
      <img src="../../public/pictures/about.jpg" alt="about picture" />
    </div>
  </div>

  <h1 class="flex justify-center text-3xl">What Our Clients Said</h1>

  <article class="rounded-xl border border-gray-700 bg-gray-800 p-4 mx-5 my-5">
    <div class="flex items-center gap-4">
      <img
        alt="Developer"
        src="../../public/pictures/hassan.jpg"
        class="h-16 w-16 rounded-full object-cover"
      />

      <div>
        <h3 class="text-lg font-medium text-white">Hassan Nouhi</h3>

        <div class="flow-root">
          <ul class="-m-1 flex flex-wrap">
            <li class="p-1 leading-none">
              <a href="#" class="text-xs font-medium text-gray-300">
                Twitter
              </a>
            </li>

            <li class="p-1 leading-none">
              <a href="#" class="text-xs font-medium text-gray-300"> GitHub </a>
            </li>

            <li class="p-1 leading-none">
              <a href="#" class="text-xs font-medium text-gray-300">Website</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <ul class="mt-4 space-y-2">
      <li>
        <a
          href="#"
          class="block h-full rounded-lg border border-gray-700 p-4 hover:border-pink-600"
        >
          <strong class="font-medium text-white">Project A</strong>

          <p class="mt-1 text-xs font-medium text-gray-300">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime
            consequuntur deleniti, unde ab ut in!
          </p>
        </a>
      </li>
    </ul>
  </article>

  <h1 class="flex justify-center text-3xl">Companies</h1>

  <div class="flex justify-center justify-around mt-5">
    <div class="w-20 h-20 rounded-full">
      <img src="../../public/pictures/C-logo.jpeg" alt="" />
    </div>
    <div class="w-20 h-20 rounded-full">
      <img src="../../public/pictures/th (1).jpeg" alt="" />
    </div>
    <div class="w-20 h-20 rounded-full">
      <img src="../../public/pictures/th (2).jpeg" alt="" />
    </div>
    <div class="w-20 h-20 rounded-full">
      <img src="../../public/pictures/th (3).jpeg" alt="" />
    </div>
    <div class="w-20 h-20 rounded-full">
      <img src="../../public/pictures/th (4).jpeg" alt="" />
    </div>
  </div>
</template>
