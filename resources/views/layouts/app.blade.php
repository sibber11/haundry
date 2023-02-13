<!doctype html>
<html lang="en">
@include('layouts.header')
@stack('styles')
<body>
@include('layouts.nav')
<main id="app">
    @yield('content')
</main>
@include('layouts.footer')
</body>
@stack('scripts')
</html>
