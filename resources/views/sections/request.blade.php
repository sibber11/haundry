<section class="w-full px-8 py-16 bg-gray-100 xl:px-8">
    <div class="max-w-6xl mx-auto">
        <div class="flex flex-col items-center md:flex-row">

            <div class="w-full space-y-5 md:w-3/5 md:pr-16">
                <p class="font-medium text-blue-500 uppercase" data-primary="blue-500">
                    Making Laundry Easy
                </p>
                <h2 class="text-2xl font-extrabold leading-none text-black sm:text-3xl md:text-5xl">
                    Efficient laundry and dry cleaning services at your doorstep
                </h2>
                <p class="text-xl text-gray-600 md:pr-16">
                    Book your pickup today and experience the difference that <b>{{config('app.name')}}</b> can make
                    in
                    your life.
                </p>
            </div>

            <div class="w-full mt-16 md:mt-0 md:w-2/5">
                <div
                    class="relative z-10 h-auto p-8 py-10 overflow-hidden bg-sky-50 border-b-2 border-gray-300 rounded-lg shadow-2xl px-7"
                    data-rounded="rounded-lg" data-rounded-max="rounded-full">
                    <h3 class="mb-6 text-2xl font-medium text-center">Request a call now</h3>
                    <input type="text" name="email" id="email"
                           class="block w-full px-4 py-3 mb-4 border border-2 border-transparent border-gray-200 rounded-lg focus:ring focus:ring-blue-500 focus:outline-none"
                           data-rounded="rounded-lg" data-primary="blue-500" placeholder="Enter name...">
                    <input type="text" name="password" id="password"
                           class="block w-full px-4 py-3 mb-4 border border-2 border-transparent border-gray-200 rounded-lg focus:ring focus:ring-blue-500 focus:outline-none"
                           data-rounded="rounded-lg" data-primary="blue-500" placeholder="Enter phone number...">
                    <div class="block">
                        <button class="w-full px-3 py-4 font-medium text-white bg-secondary rounded-lg"
                                data-primary="blue-600" data-rounded="rounded-lg">Request
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
