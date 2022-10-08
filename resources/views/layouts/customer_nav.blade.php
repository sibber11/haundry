<nav class="bg-white flex flex-col sm:flex-row justify-between p-2">
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
    @include('layouts.links', ['flex' => false])
    <ul class="hidden inline-flex sm:flex border-2 border-macaw-900 rounded max-w-min"
        id="second-nav">
        @auth
            <li class="p-1">
                <a href={{route('profile')}} class="nav-link"
                   onclick="document.getElementById('profile').classList.toggle('hidden')">
                    <span class="whitespace-nowrap">{{auth('customer')->user()->name}}</span>
                </a>
            </li>
            <li class="text-macaw-900 text-2xl font-light">/</li>
            <li class="p-1">
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
