<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    @if(config('app.env') == 'production')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
              integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
              crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css"
              integrity="sha512-IuO+tczf4J43RzbCMEFggCWW5JuX78IrCJRFFBoQEXNvGI6gkUw4OjuwMidiS4Lm9Q2lILzpJwZuMWuSEeT9UQ=="
              crossorigin="anonymous" referrerpolicy="no-referrer"/>
    @else
        <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('vendor/adminlte/css/adminlte.min.css')}}">
    @endif
    @vite('resources/css/admin/app.css')
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
        <strong>Copyright &copy; 2022 <a href="#">{{config('app.name')}}</a>.</strong> All rights
        reserved.
    </footer>
</div>

@if(config('app.env') == 'production')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
            integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.min.js"
            integrity="sha512-7rusk8kGPFynZWu26OKbTeI+QPoYchtxsmPeBqkHIEXJxeun4yJ4ISYe7C6sz9wdxeE1Gk3VxsIWgCZTc+vX3g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/adminlte.min.js"
            integrity="sha512-KBeR1NhClUySj9xBB0+KRqYLPkM6VvXiiWaSz/8LCQNdRpUm38SWUrj0ccNDNSkwCD9qPA4KobLliG26yPppJA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@else
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('vendor/adminlte/js/adminlte.min.js')}}"></script>
@endif
@vite('resources/js/admin/app.js')
<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js"></script>
<script>
    let fcmToken = "{{route('fcmToken')}}";
</script>
@vite('resources/js/admin/firebase.js')
<script>
    // Echo.private('admin')
    //     .listen('CallRequested', (e) => {
    //         console.log(e);
    //         $(document).Toasts('create', {
    //             title: 'New Request Call',
    //             body: e.data,
    //             position: 'bottomRight',
    //             class: 'mb-5 mr-2',
    //         })
    //
    //     });
</script>
@stack('third_party_scripts')

@stack('page_scripts')
</body>

</html>
