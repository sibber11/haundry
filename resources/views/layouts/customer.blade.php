<!doctype html>
<html lang="en">
@include("layouts.header")
<body class="bg-gray-200">
@include('layouts.customer_nav')
<main id="app" class="sm:flex mt-0 max-w-5xl mx-4 sm:mx-auto">
    <aside class="sm:w-60 sm:m-4">
        @include('layouts.links', ['flex' => true])
    </aside>
    <section class="w-full">
        @yield('content')
    </section>
</main>
</body>
<script src="{{mix('js/app.js')}}"></script>
</html>
