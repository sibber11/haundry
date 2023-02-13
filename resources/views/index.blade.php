@extends('layouts.app')
@php
    $settings = \App\Models\Settings::first();
@endphp
@section('content')
    <div class="sm:mx-4">
        @include('flash::message')
        <div class="sm:grid sm:grid-cols-2 flex flex-col-reverse mb-4">
            {{--        <img src="" alt="">--}}
            <div class="text-center">
                <div
                    class="pt-16 -mt-32 sm:pt-0 sm:mt-16 sm:bg-inherit bg-gradient-to-t from-gray-200 via-gray-200 to-transparent">
                    <h1 class="text-4xl p-4 font-bold">Dry Clean <span class="text-macaw-900">&</span><br>Laundry
                        Service</h1>
                    <h5 class="text-sm p-4">
                        {{$settings->about_top}}
                    </h5>
                </div>
                <div id="call">
                    <form method="post" class="flex flex-col gap-2"
                          action="{{route('request_call')}}">
                        @csrf
                        <input type="text" placeholder="Your name here..."
                               class="p-1 rounded border-2 border-macaw-900 @error('name') border-red-600 @enderror"
                               name="name" value="{{session('name')}}">
                        <input type="text" placeholder="Your number here..."
                               class="p-1 rounded border-2 border-macaw-900 @error('phone') border-red-600 @enderror"
                               name="phone" value="{{session('phone')}}">
                        <button class="rounded bg-macaw-900 px-2 py-1 text-white border-2 border-macaw-900">Request a
                            Call
                        </button>
                    </form>
                    {{--todo:let the customer know, that request call is been placed --}}
                </div>
                <div class="sm:hidden mt-2">
                    <a href="{{route('orders.create')}}"
                       class="block rounded bg-macaw-900 px-2 py-1 text-white border-2 border-macaw-900">
                        Order Now
                    </a>
                </div>
            </div>
            <div class="-z-10 sm:z-auto my-2 sm:ml-2">
                {{--                <img src="{{asset('images/home_back.png')}}" alt="" style="max-width: 100%; max-height: 100%">--}}
                @include('sections.slideshow')
            </div>
        </div>
        <div class="flex flex-col sm:flex-row gap-3 my-1.5">
            <div class="flex flex-col w-full justify-between">
                <div class="service-name">
                    <h2>Our Services</h2>
                </div>
                <div id="services"
                     class="bg-white text-center grid grid-cols-2 sm:grid-cols-4 justify-between py-5 shadow">
                    <div class="my-3 sm:my-0">
                        <div class="service">
                            <i class="fa fa-3x text-macaw-900 pt-[1rem] fa-tshirt"></i>
                        </div>
                        <div class="text-lg font-bold">Laundry</div>
                    </div>
                    <div class="my-3 sm:my-0">
                        <div class="service">
                            <i class="fa fa-3x text-macaw-900 pt-[1rem] fa-tint"></i>
                        </div>
                        <div class="text-lg font-bold">Dry Cleaning</div>
                    </div>
                    <div class="my-3 sm:my-0">
                        <div class="service">
                            <i class="fa fa-3x text-macaw-900 pt-[1rem] fa-water"></i>
                        </div>
                        <div class="text-lg font-bold">Wash</div>
                    </div>
                    <div class="my-3 sm:my-0">
                        <div class="service">
                            <i class="fa fa-3x text-macaw-900 pt-[1rem] fa-fire-alt"></i>
                        </div>
                        <div class="text-lg font-bold">Iron</div>
                    </div>
                </div>
            </div>
        </div>
        @include('sections.packages')
        @include('sections.prices')
        @include('sections.choose')
        @include('sections.reviews')
        @include('sections.about')
        @include('sections.contact')
    </div>
@endsection
{{--
todo: add a section for the customer to know about the company
todo: add a functinoal slider
todo: add cart functionality
todo: simplify profile page
todo: disable voucher
todo: add map coordinates to the address

--}}
