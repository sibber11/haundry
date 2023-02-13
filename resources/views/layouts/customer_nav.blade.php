<header class="w-full px-8 text-gray-700 bg-white">
    <div class="container flex flex-col flex-wrap items-center justify-between py-5 mx-auto md:flex-row max-w-7xl">
        <div class="flex justify-between md:w-auto w-full">
            <a href="{{route('home')}}"
               class="flex items-center font-medium text-gray-900 lg:w-auto  lg:justify-center md:mb-0">
                <span class="mx-auto text-xl font-black leading-none text-gray-900 select-none">
                    <b>{{config('app.name')}}</b>
                    <span class="text-tertiary">.</span>
                </span>
            </a>
            <button class="sm:hidden p-2" type="button"
                    onclick="
                document.getElementById('main-nav').classList.toggle('hidden');
                ">
                <i class="fa fa-bars"></i>
            </button>
        </div>
        <nav class="inline-flex items-center ml-5 space-x-6 lg:justify-end hidden md:block">
            <form id="logout-form" action="{{route('logout')}}" method="POST" class="hidden">
                @csrf
            </form>
            <a href="#"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-tertiary border border-transparent rounded-md shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-tertiary">
                Sign out
            </a>
        </nav>
    </div>
</header>

