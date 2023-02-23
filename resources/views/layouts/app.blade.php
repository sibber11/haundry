<!doctype html>
<html lang="en">
@include('layouts.header')
@stack('styles')
<body>
@include('layouts.nav')
<main id="app">
    @yield('content')
    <back-to-top></back-to-top>
</main>
@include('layouts.footer')
</body>
@stack('scripts')
</html>
