<!doctype html>
<html lang="en">
@include('layouts.header')
<body class="bg-gray-200">
@include('layouts.nav')
<main id="app" class="mt-0 max-w-5xl mx-4 sm:mx-auto">
    @yield('content')
</main>
</body>
</html>
