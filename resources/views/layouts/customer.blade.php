<!doctype html>
<html lang="en">
@include("layouts.header")
<body class="bg-gray-200">
@include('layouts.customer_nav')
<main id="app" class="max-w-7xl sm:mx-auto sm:flex">

    @include('layouts.links', ['flex' => true])

    <section class="w-full md:mr-4">
        @yield('content')
    </section>
</main>
</body>

</html>

