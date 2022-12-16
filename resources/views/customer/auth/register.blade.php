@extends('customer.auth.app')

@section('content')
    <form method="post" action="{{route('register')}}">
        @csrf
        <p class="mb-4">Please fill the form to register</p>
        <div class="mb-4">
            <input
                type="text"
                class="@error('name') border-red-600 @enderror form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                id="name"
                placeholder="Name"
                name="name"
                value="{{old('name')}}"
            />

            @error('name')
            <div class="text-sm text-red-600 mt-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <input
                type="text"
                class="@error('email') border-red-600 @enderror form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                id="email"
                placeholder="Email"
                name="email"
                value="{{old('email')}}"
            />

            @error('email_or_phone')
            <div class="text-sm text-red-600 mt-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <input
                type="text"
                class="@error('phone') border-red-600 @enderror form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                id="phone"
                placeholder="Phone"
                name="phone"
                value="{{old('phone')}}"
            />

            @error('phone')
            <div class="text-sm text-red-600 mt-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <input
                type="text"
                class="@error('address') border-red-600 @enderror form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                id="address"
                placeholder="Address"
                name="address"
                value="{{old('address')}}"
            />

            @error('address')
            <div class="text-sm text-red-600 mt-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <input
                type="password"
                class="@error('password') border-red-600 @enderror block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                id="password"
                placeholder="Password"
                name="password"
            />
            @error('password')
            <div class="text-sm text-red-600 mt-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <input
                type="password"
                class="@error('password_confirmation') border-red-600 @enderror block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                id="password_confirmation"
                placeholder="Confirm Password"
                name="password_confirmation"
            />
            @error('password_confirmation')
            <div class="text-sm text-red-600 mt-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <input
                type="checkbox"
                id="terms"
                name="terms"
                value="1"
            />
            <label for="terms">Agree to <a href="#" class="text-macaw-900">Terms</a> &
                <a
                    href="#" class="text-macaw-900">Privacy
                    Policy</a></label>
        </div>
        <div class="text-center pt-1 mb-6 pb-1">
            <button
                class="inline-block px-6 py-2.5 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out w-full mb-3"
                type="submit"
                data-mdb-ripple="true"
                data-mdb-ripple-color="light"
                style="background: rgb(63,194,201);background: linear-gradient(90deg, rgba(63,194,201,1) 0%, rgba(60,100,177,1) 28%, rgba(71,81,145,1) 62%, rgba(126,82,193,1) 100%);"
            >
                Register
            </button>
            {{--                                        <a class="text-gray-500" href="{{ route('password.request') }}">--}}
            {{--                                            Forgot password?--}}
            {{--                                        </a>--}}
        </div>
        <div class="flex items-center justify-between pb-3">
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
    </form>
@endsection
