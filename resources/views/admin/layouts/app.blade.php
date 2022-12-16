<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
          integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
          crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css"
          integrity="sha512-IuO+tczf4J43RzbCMEFggCWW5JuX78IrCJRFFBoQEXNvGI6gkUw4OjuwMidiS4Lm9Q2lILzpJwZuMWuSEeT9UQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js"></script>

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
        <strong>Copyright &copy; 2022 <a href="#">{{config('app.name')}}</a>.</strong> All rights
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
<script>
    // Your web app's Firebase configuration
    const firebaseConfig = {
        apiKey: "{{env('FIREBASE_API_KEY')}}",
        authDomain: "{{env('FIREBASE_AUTH_DOMAIN')}}",
        projectId: "{{env('FIREBASE_PROJECT_ID')}}",
        storageBucket: "{{env('FIREBASE_STORAGE_BUCKET')}}",
        messagingSenderId: "{{env('FIREBASE_MESSAGING_SENDER_ID')}}",
        appId: "{{env('FIREBASE_APP_ID')}}"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);

    const messaging = firebase.messaging();

    function initFirebaseMessagingRegistration() {
        messaging.requestPermission().then(function () {
            return messaging.getToken()
        }).then(function (token) {

            axios.post("{{ route('fcmToken') }}", {
                _method: "PATCH",
                token
            }).then(({data}) => {
                console.log(data)
            }).catch(({response: {data}}) => {
                console.error(data)
            })

        }).catch(function (err) {
            console.log(`Token Error :: ${err}`);
        });
    }

    initFirebaseMessagingRegistration();

    messaging.onMessage(function ({data: {body, title}}) {
        new Notification(title, {body});
    });
</script>

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
