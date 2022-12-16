<!doctype html>
<html lang="en">
@include('layouts.header')
<body class="bg-gray-200">
<header class="shadow">
    @include('layouts.nav')
</header>
<main id="app" class="mt-0 max-w-5xl mx-4 sm:mx-auto">
    @yield('content')
</main>
<footer class="mt-0 max-w-5xl mx-4 sm:mx-auto">
    @include('layouts.footer')
</footer>
</body>
</html>
