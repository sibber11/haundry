<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}}</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
          integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
          crossorigin="anonymous"/>
</head>
<body class="bg-gray-200">
@include('layouts.customer_nav')
<div id="app" class="sm:grid sm:grid-cols-3 sm:mr-4">
    <aside class="sm:m-4">
        <ul class="hidden sm:flex sm:flex-col"
            id="main-nav">
            <li class="nav-item active">
                <a class="nav-link active" href="{{route('order.create')}}">Order Now</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('profile')}}">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('order.index')}}">Orders</a>
            </li>
            {{--            <li class="nav-item">--}}
            {{--                <a class="nav-link" href="{{route('voucher')}}">Vouchers</a>--}}
            {{--            </li>--}}
        </ul>
    </aside>
    <section class="sm:col-span-2 m-4">
        @yield('content')
    </section>
</div>
</body>
{{--<script src="{{mix('js/app.js')}}"></script>--}}
</html>
