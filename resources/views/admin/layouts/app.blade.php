<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    {{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"--}}
    {{--          integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="--}}
    {{--          crossorigin="anonymous"/>--}}
    {{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css"--}}
    {{--          integrity="sha512-IuO+tczf4J43RzbCMEFggCWW5JuX78IrCJRFFBoQEXNvGI6gkUw4OjuwMidiS4Lm9Q2lILzpJwZuMWuSEeT9UQ=="--}}
    {{--          crossorigin="anonymous" referrerpolicy="no-referrer"/>--}}
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @stack('third_party_stylesheets')

    @stack('page_css')

</head>

<body class="hold-transition sidebar-collapse sidebar-mini layout-fixed dark-mode">
<div class="wrapper">
    <!-- Main Header -->
    @include('admin.layouts.header')

    <!-- Left side column. contains the logo and sidebar -->
    @include('admin.layouts.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" id="app">
        @yield('content')
    </div>

    <!-- Main Footer -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.0.5
        </div>
        <strong>Copyright &copy; 2014-2022 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
        reserved.
    </footer>
</div>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"--}}
{{--        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="--}}
{{--        crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.min.js"--}}
{{--        integrity="sha512-7rusk8kGPFynZWu26OKbTeI+QPoYchtxsmPeBqkHIEXJxeun4yJ4ISYe7C6sz9wdxeE1Gk3VxsIWgCZTc+vX3g=="--}}
{{--        crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/adminlte.min.js"--}}
{{--        integrity="sha512-KBeR1NhClUySj9xBB0+KRqYLPkM6VvXiiWaSz/8LCQNdRpUm38SWUrj0ccNDNSkwCD9qPA4KobLliG26yPppJA=="--}}
{{--        crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/3.2.40/vue.cjs.js"--}}
{{--        integrity="sha512-zdVl3VXeIbC+voYo4oJ7cIvMb8mP1l8LFe2pF0PlYlHwqEP0mcAyDIl1XSaQZwALrC2tYsFg+rww4TF4I/4lTA=="--}}
{{--        crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
<script src="{{ mix('js/app.js') }}"></script>
@stack('third_party_scripts')

@stack('page_scripts')
</body>

</html>
