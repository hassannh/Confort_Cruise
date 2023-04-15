<template>




<!-- component -->
<div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12 sm:my-4 mx-4">
	<div class="relative py-3 sm:max-w-xl sm:mx-auto">
		<div
        class="absolute inset-0 bg-gradient-to-r from-yellow-300 to-yellow-600 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl"
>
		</div>
		<div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
			<div class="max-w-md mx-auto">
				<div>
					<h1 class="text-2xl font-semibold">Feel Free !! Leave A Message</h1>
				</div>
				<div class="divide-y divide-gray-200">
					<div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
						<div class="relative">
							<input autocomplete="off" name="Username" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600" placeholder="Username" />
							<label for="Username" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Username</label>
						</div>
						<div class="relative">
							<input autocomplete="off" id="email" name="email" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600" placeholder="Email address" />
							<label for="email" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Email Address</label>
						</div>
						<div class="relative">
							<input autocomplete="off" id="email" name="Phone" type="number" class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600" placeholder="Phone Number" />
							<label for="Phone" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Phone Number</label>
						</div>



                        
						<div class="relative">
							<textarea autocomplete="off" id="message" name="message"  class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600" placeholder="Leave a Message">
                            
                            </textarea>
							<label for="message" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">message</label>
						</div>




						<div class="relative">
							<button type="submit" class="border-2 border-yellow-600 rounded-lg px-3 py-2 text-yellow-400 cursor-pointer hover:bg-yellow-600 hover:text-yellow-200">Submit</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

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