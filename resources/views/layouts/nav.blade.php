<nav class="bg-macaw-900 flex flex-col sm:flex-row justify-between">
    {{--    <div class="text-white nav-item sm:hidden">--}}
    {{--        <img src="" alt="">--}}
    {{--        <a class="nav-brand" href="{{url('/')}}">{{config('app.name')}}</a>--}}
    {{--    </div>--}}
    <div class="flex flex-row justify-between">
        <ul class="">
            <li class="p-4 text-white nav-item text-lg">
                <img src="" alt="">
                <a class="nav-brand" href="{{url('/')}}">{{config('app.name')}}</a>
            </li>
        </ul>
        <button class="sm:hidden p-2" type="button"
                onclick="document.getElementById('main-nav').classList.toggle('h-0');">
            <i class="fa fa-bars text-white"></i>
        </button>
    </div>
    <ul class="flex flex-col sm:flex-row h-0 sm:h-auto overflow-hidden sm:mt-0 bg-macaw-900 w-full"
        id="main-nav">
        <li class="nav-item active">
            <a class="nav-link active" href="{{route('order.create')}}" @guest data-toggle="modal"
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
    <ul class="sm:flex hidden" id="second-nav">
        @guest('customer')
            <li class="nav-item">
                <a href="{{route('register')}}" class="nav-link">Register</a>
            </li>
            <li class="nav-item">
                <a href="{{route('login')}}" class="nav-link">Login</a>
            </li>
            {{--                <li class="nav-item">--}}
            {{--                    <a href="{{route('admin.login')}}" class="nav-link">Login Admin</a>--}}
            {{--                </li>--}}
        @endguest
        @auth
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <img src="" class="user-image img-circle elevation-2" alt="img">
                    <span class="d-none d-md-inline">{{auth('customer')->user()->name}}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                    <li class="nav-item bg-dark">
                        <a href="{{route('order.index')}}" class="nav-link">Orders</a>
                    </li>
                    <li class="nav-item bg-dark">
                        <a href="{{route('profile')}}" class="nav-link">Profile</a>
                    </li>
                    <li class="nav-item bg-dark">
                            <span class="nav-link">
                                Total Point: {{auth('customer')->user()->point->total}}
                            </span>
                    </li>
                    <li class="user-footer">
                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                        <a href="#" class="btn btn-default btn-flat float-right"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Sign out
                        </a>
                        <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        @endauth
    </ul>
</nav>
