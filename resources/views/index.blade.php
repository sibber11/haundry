@extends('layouts.app')

@section('content')
    <div class="sm:mx-4">
        <div class="sm:grid sm:grid-cols-2 flex flex-col-reverse mb-4">
            {{--        <img src="" alt="">--}}
            <div class="text-center">
                <div
                    class="pt-16 -mt-32 sm:pt-0 sm:mt-16 sm:bg-inherit bg-gradient-to-t from-gray-200 via-gray-200 to-transparent">
                    <h1 class="text-4xl p-4 font-bold">Dry Clean <span class="text-macaw-900">&</span><br>Laundry
                        Service</h1>
                    <h5 class="text-sm p-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab
                        accusantium.</h5>
                </div>
                <div id="call">
                    <form method="post" class="flex flex-col gap-2"
                          action="{{route('request_call')}}">
                        @csrf
                        <input type="text" placeholder="Your name here..." class="p-1 rounded border-2 border-macaw-900"
                               name="name">
                        <input type="text" placeholder="Your number here..."
                               class="p-1 rounded border-2 border-macaw-900"
                               name="phone">
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
            <div class="-z-10 sm:z-auto">
                {{--                <img src="{{asset('images/home_back.png')}}" alt="" style="max-width: 100%; max-height: 100%">--}}
                @include('sections.slideshow')
            </div>
        </div>
        <div class="flex flex-col sm:flex-row gap-3 my-1.5">
            <div id="refer" class="text-center text-white p-2 bg-macaw-900 text-2xl shadow sm:leading-loose">
                <a href="{{route('referview')}}">Refer a Friend <br>&<br> Get 20% Off First Order.</a>
            </div>
            <div class="flex flex-col w-full justify-between">
                <div class="service-name">
                    <h2>Our Services</h2>
                </div>
                <div id="services"
                     class="bg-white text-center grid grid-cols-2 sm:grid-cols-4 justify-between py-5 shadow">
                    <div class="my-3 sm:my-0">
                        <div class="service">
                            <i class="fa fa-home fa-2x text-macaw-900 pt-5"></i>
                        </div>
                        <div class="text-lg font-bold">Laundry</div>
                    </div>
                    <div class="my-3 sm:my-0">
                        <div class="service">
                            <i class="fa fa-home fa-2x text-macaw-900 pt-5"></i>
                        </div>
                        <div class="text-lg font-bold">Dry Cleaning</div>
                    </div>
                    <div class="my-3 sm:my-0">
                        <div class="service">
                            <i class="fa fa-home fa-2x text-macaw-900 pt-5"></i>
                        </div>
                        <div class="text-lg font-bold">Wash</div>
                    </div>
                    <div class="my-3 sm:my-0">
                        <div class="service">
                            <i class="fa fa-home fa-2x text-macaw-900 pt-5"></i>
                        </div>
                        <div class="text-lg font-bold">Iron</div>
                    </div>
                </div>
            </div>
        </div>
        @include('sections.packages')
        @include('sections.prices')
        @include('sections.choose')
        <div class="service-name">
            <h2>Customer Reviews</h2>
        </div>
        <div id="reviews" class="grid grid-cols-1 sm:grid-cols-2 gap-3">
            <x-review></x-review>
            <x-review></x-review>
        </div>
        @include('sections.about')
        @include('sections.contact')
    </div>
@endsection
