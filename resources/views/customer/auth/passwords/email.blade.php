@extends('customer.auth.app')

@section('content')
    {{--    <div class="">
            <div class="">
                <a href="{{ url('/home') }}"><b>{{ config('app.name') }}</b></a>
            </div>

            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg"></p>

                    <form action="" method="post">
                        @csrf

                        <div class="input-group mb-3">
                            <input type="email"
                                   name="email"
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                   placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                            </div>
                            @if ($errors->has('email'))
                                <span class="error invalid-feedback">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block"></button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                    <p class="mt-3 mb-1">
                        <a href="{{ route("login") }}">Login</a>
                    </p>
                    <p class="mb-0">
                        <a href="{{ route("register") }}" class="text-center">Register a new membership</a>
                    </p>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>--}}
    <form method="post" action="{{ route('password.email') }}">
        @csrf
        <p class="mb-4">You forgot your password? Here you can easily retrieve a new
            password.</p>
        <div class="mb-4">
            <input
                type="text"
                class="@error('email') border-red-600 @enderror form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                id="username"
                placeholder="Email"
                name="email"
            />

            @error('email')
            <div class="text-sm text-red-600 mt-4">{{ $message }}</div>
            @enderror
            @if (session('status'))
                <div class="text-sm text-red-600 mt-4">
                    {{ session('status') }}
                </div>
            @endif
        </div>
        <div class="text-center pt-1 mb-12 pb-1">
            <button
                class="inline-block px-6 py-2.5 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out w-full mb-3"
                type="submit"
                data-mdb-ripple="true"
                data-mdb-ripple-color="light"
                style="background: rgb(63,194,201);background: linear-gradient(90deg, rgba(63,194,201,1) 0%, rgba(60,100,177,1) 28%, rgba(71,81,145,1) 62%, rgba(126,82,193,1) 100%);"
            >
                Send Password Reset Link
            </button>

        </div>
        <div class="flex items-center justify-between pb-6">
            <p class="mb-0 mr-2">Already have an account?</p>
            <a
                class="inline-block px-6 py-2 border-2 border-macaw-900 text-macaw-900 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                data-mdb-ripple="true"
                data-mdb-ripple-color="light"
                href="{{ route('login') }}"
            >
                Login
            </a>
        </div>
        <div class="flex items-center justify-between pb-6">
            <p class="mb-0 mr-2">Don't have an account?</p>
            <a
                class="inline-block px-6 py-2 border-2 border-macaw-900 text-macaw-900 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                data-mdb-ripple="true"
                data-mdb-ripple-color="light"
                href="{{ route('register') }}"
            >
                Register
            </a>
        </div>
    </form>
@endsection
