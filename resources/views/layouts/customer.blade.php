<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <title>{{config('app.name')}}</title>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="{{url('/')}}">{{config('app.name')}}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('order.create')}}" @guest data-toggle="modal" data-target="#order" @endguest>Order Now</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#our-service">Our Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#how-it-works">How it works</a>
            </li>
            <!--            <li class="nav-item">
                            <a class="nav-link" href="#pricing">Price</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#package">Packages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#why-choose-us">Why choose us?</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about-us">About us</a>
                        </li>-->
            <!--            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                Dropdown
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>-->
            {{--            <li class="nav-item">--}}
            {{--                <a class="nav-link disabled" href="#">Disabled</a>--}}
            {{--            </li>--}}
        </ul>


        <ul class="navbar-nav">
            @guest('customer')
                <li class="nav-item">
                    <a href="{{route('register')}}" class="nav-link">Register</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('login')}}" class="nav-link">Login</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.login')}}" class="nav-link">Login Admin</a>
                </li>
            @endguest
            @auth
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <img src="" class="user-image img-circle elevation-2" alt="img">
                        <span class="d-none d-md-inline">{{auth()->user()->name}}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <li class="nav-item bg-dark">
                            <a href="{{route('order.index')}}" class="nav-link">Orders</a>
                        </li>
                        <li class="nav-item bg-dark">
                            <a href="{{route('order.index')}}" class="nav-link">Profile</a>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
{{--                            <a href="#" class="btn btn-default btn-flat">Profile</a>--}}
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
    </div>
</nav>
<div id="app">
    @yield('content')
</div>
</body>
<script src="{{mix('js/app.js')}}"></script>
@stack('page_scripts')
</html>
