@extends('layouts.app')

@section('content')
    <section class="px-2 pt-8 sm:pt-32 bg-white md:px-0">
        <div class="container items-center max-w-6xl px-5 mx-auto space-y-6 text-center">
            <h1 class="text-4xl font-extrabold tracking-tight text-left text-gray-900 sm:text-5xl md:text-6xl md:text-center">
            <span class="block">
                <span class="text-tertiary">Dry Clean</span>
                <span class="text-macaw-900"> & </span>
                <br>
                <span class="">Laundry Services</span>
            </span>
            </h1>
            <p class="w-full mx-auto text-base text-left text-gray-500 md:max-w-md sm:text-lg lg:text-2xl md:max-w-3xl md:text-center">
                Experience the Ultimate Convenience with <b>{{config('app.name')}}</b>'s Laundry and Dry Cleaning
                Services
            </p>
            <div class="relative flex flex-col justify-center md:flex-row md:space-x-4">
                <a href="{{route('orders.create')}}"
                   class="flex items-center w-full px-6 py-3 mb-3 text-lg text-white bg-secondary rounded-md md:mb-0 hover:bg-purple-700 md:w-auto"
                   data-primary="purple-500" data-rounded="rounded-md">
                    Order Now
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-1" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </a>
                <a href="#about-us"
                   class="flex items-center px-6 py-3 text-gray-500 bg-gray-100 rounded-md hover:bg-gray-200 hover:text-gray-600"
                   data-rounded="rounded-md">
                    Learn More
                </a>
            </div>
        </div>
        @include('sections.slideshow')

    </section>

    @include('sections.request')

    @include('sections.services')

    @include('sections.features')

    @include('sections.reviews')

    @include('sections.faq')

    @include('sections.about')

@endsection
