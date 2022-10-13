<nav class="bg-white flex flex-col sm:flex-row justify-between p-2 sticky">
    <div class="flex flex-row justify-between">
        <ul class="">
            <li class="p-4 nav-item text-lg">
                <img src="" alt="">
                <a class="nav-brand" href="{{url('/')}}">{{config('app.name')}}</a>
            </li>
        </ul>
        <button class="sm:hidden p-2" type="button"
                onclick="
                document.getElementById('main-nav').classList.toggle('hidden');
                document.getElementById('second-nav').classList.toggle('hidden');
                ">
            <i class="fa fa-bars"></i>
        </button>
    </div>
    <ul class="hidden sm:flex flex-col sm:flex-row gap-2"
        id="main-nav">
        <li class="nav-item highlight">
            <a class="" href="{{route('orders.create')}}" @guest data-toggle="modal"
               data-target="#order" @endguest>Order Now</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#services">Our Services</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#price">Price</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#about">About us</a>
        </li>
        <li class="nav-item sm:hidden">
            <a class="nav-link" href="#packages">Packages</a>
        </li>
        <li class="nav-item sm:hidden">
            <a class="nav-link" href="#choose">Why choose us?</a>
        </li>
        <li class="nav-item sm:hidden">
            <a class="nav-link" href="#">How it works</a>
        </li>
    </ul>
    <ul class="hidden inline-flex sm:flex border-2 border-macaw-900 rounded items-center flex-row justify-between max-w-min"
        id="second-nav">
        @guest('customer')
            <li class="p-1">
                <a href="{{route('register')}}" class="">Register</a>
            </li>
            <li class="text-macaw-900 text-2xl font-light">/</li>
            <li class="p-1">
                <a href="{{route('login')}}" class="">Login</a>
            </li>
        @endguest
        @auth
            <li class="p-1">
                <a href={{route('profile')}} class="nav-link"
                   onclick="document.getElementById('profile').classList.toggle('hidden')">
                    {{--                    <img src="" class="inline" alt="img">--}}
                    <span class="whitespace-nowrap">{{auth('customer')->user()->name}}</span>
                </a>
            </li>
            <li class="text-macaw-900 text-2xl font-light">/</li>
            <li class="p-1">
                {{--                <a href="#" class="bg-macaw-900 text-white p-2 rounded">Profile</a>--}}
                <a href="#" class="whitespace-nowrap"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Sign out
                </a>
                <form id="logout-form" action="{{route('logout')}}" method="POST" class="hidden">
                    @csrf
                </form>
            </li>
        @endauth
    </ul>
</nav>
