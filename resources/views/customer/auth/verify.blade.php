@extends('customer.auth.app')

@section('content')
    <div class="p-4">
        @if (session('resent'))
            <div class="font-bold">A fresh verification link has been sent to
                your email address
            </div>
        @endif
    </div>
    <p class="p-4">Verify Your Email Address</p>
    <p class="p-4">Before proceeding, please check your email for a verification link.
        If you did not receive the email.</p>
    <a href="#"
       class="inline-block px-6 py-2.5 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out w-full mb-3"
       data-mdb-ripple="true"
       data-mdb-ripple-color="light"
       style="background: rgb(63,194,201);background: linear-gradient(90deg, rgba(63,194,201,1) 0%, rgba(60,100,177,1) 28%, rgba(71,81,145,1) 62%, rgba(126,82,193,1) 100%);"
       onclick="event.preventDefault(); document.getElementById('resend-form').submit();">
        Click here to request another
    </a>
    <form id="resend-form" action="{{ route('verification.resend') }}" method="POST" class="d-none">
        @csrf
    </form>
@endsection
