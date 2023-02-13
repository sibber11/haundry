<header class="w-full px-8 text-gray-700 bg-white">
    <div class="container flex flex-col flex-wrap items-center justify-between py-5 mx-auto md:flex-row max-w-7xl">
        <div class="relative flex flex-col md:flex-row">
            <a href="{{route('home')}}"
               class="flex items-center mb-5 font-medium text-gray-900 lg:w-auto lg:items-center lg:justify-center md:mb-0">
                <span class="mx-auto text-xl font-black leading-none text-gray-900 select-none">
                    <b>{{config('app.name')}}</b><span
                        class="text-tertiary">.</span>
                </span>
            </a>
            <nav
                class="flex flex-wrap items-center mb-5 text-base md:mb-0 md:pl-8 md:ml-8 md:border-l md:border-gray-200">
                <a href="{{route('home')}}"
                   class="mr-5 font-medium leading-6 text-gray-600 hover:text-gray-900">Home</a>
                <a href="#features"
                   class="mr-5 font-medium leading-6 text-gray-600 hover:text-gray-900">Features</a>
                <a href="#services" class="mr-5 font-medium leading-6 text-gray-600 hover:text-gray-900">Services</a>
                <a href="#about-us" class="mr-5 font-medium leading-6 text-gray-600 hover:text-gray-900">About</a>
            </nav>
        </div>

        <nav class="inline-flex items-center ml-0 sm:ml-5 space-x-6 lg:justify-end">
            <a href="{{route('login')}}"
               class="text-base font-medium leading-6 text-gray-600 whitespace-no-wrap transition duration-150 ease-in-out hover:text-gray-900">
                Sign in
            </a>
            <a href="{{route('register')}}"
               class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-tertiary border border-transparent rounded-md shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-tertiary">
                Sign up
            </a>
        </nav>
    </div>
</header>
