@extends('layouts.customer')

@php
    $user = auth('customer')->user();
@endphp

@section('content')
    <div class="m-2 sm:m-4">
        @if(session()->has('status'))
            <div class="bg-green-500 p-2 text-white rounded" id="notification">
            <span>
                Invitation Sent!
            </span>
                <button class="rounded" type="button" onclick="document.getElementById('notification').hidden = true">
                    <i class="fa fa-cross"></i>
                    close
                </button>
            </div>
        @endif
        <h1>Refer to get bonus.</h1>
        <div>
            <h2>You can send the url below to someone. if they sign up using the link, you will be rewarded.</h2>
            <h2>Your referral url</h2>
            <div>
                <input type="text" contenteditable="false" value="{{$user->getReferralLink()}}"
                       class="w-72 py-1 px-2 rounded my-2 rounded-r-none border-r-2" id="refer-link">
                <button type="button" class="rounded py-1 px-2 my-2 bg-white rounded-l-none"
                        onclick="navigator.clipboard.writeText(document.getElementById('refer-link').value);">
                    <i class="fa fa-copy"></i>
                </button>
            </div>
        </div>
        <form action="{{route('sendrefer')}}" method="post" class="my-4">
            @csrf
            <div class="flex flex-col gap-2">
                <label for="mail">Email:</label>
                <input type="email" id="mail" name="email" class="w-80 py-1 px-2 rounded">
            </div>
            <button class="py-1 px-2 my-2 rounded bg-macaw-900 text-white">Send Referral</button>
        </form>
    </div>
@endsection
