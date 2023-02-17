<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>
        @yield('title', config('app.name'))
    </title>

    @vite('resources/js/customer/app.js')

</head>

<body>
<section class="h-full gradient-form bg-gray-200 md:h-screen">
    <div class="container sm:py-12 sm:px-6 h-full mx-auto">
        <div class="flex justify-center items-center flex-wrap h-full g-6 text-gray-800">
            <div class="xl:w-10/12">
                <div class="block bg-white sm:shadow-lg sm:rounded-lg">
                    <div class="lg:flex lg:flex-wrap g-0">
                        <div class="lg:w-6/12 px-4 md:px-0">
                            <div class="md:p-12 md:mx-6 p-6">
                                <a href="{{url('/')}}" class="text-center">
                                    <img
                                        class="mx-auto w-20"
                                        src="{{asset('images/logo.png')}}"
                                        alt="logo"
                                    />
                                    <h4 class="text-xl font-semibold mt-1 mb-12 pb-1">
                                        {{config('app.name')}}
                                    </h4>
                                </a>
                                @yield('content')
                            </div>
                        </div>
                        <div
                            class="lg:w-6/12 flex items-center lg:rounded-r-lg rounded-b-lg lg:rounded-bl-none"
                            style="background: rgb(63,194,201);background: linear-gradient(90deg, rgba(63,194,201,1) 0%, rgba(60,100,177,1) 28%, rgba(71,81,145,1) 62%, rgba(126,82,193,1) 100%);"
                        >
                            <div class="text-white px-4 py-6 md:p-12 md:mx-6">
                                <h4 class="text-xl font-semibold mb-6">
                                    Effortlessly Keep Your Clothes Fresh and Clean with
                                    <b>{{config('app.name')}}</b>
                                </h4>
                                <p class="text-sm">
                                    Book your pickup today and experience the difference that
                                    <b>{{config('app.name')}}</b> can make in your life.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
<script>
    function togglePassword() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
</html>
