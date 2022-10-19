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
                <img src="{{asset('images/home_back.png')}}" alt="" style="max-width: 100%; max-height: 100%">
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
        <div class="service-name">
            <h2>Packages</h2>
        </div>
        <div id="packages" class="flex flex-col sm:flex-row gap-3 my-1.5 justify-around">
            <div class="p-6 bg-white rounded shadow w-full">
                <div class="leading-9">
                    <h4 class="text-lg font-bold">Bachelor Pack</h4>
                    <div>Item Count: <strong>100 pcs</strong></div>
                    <div>Regular Price: <strong>1000 tk</strong></div>
                    <div>Package Price: <strong>900 tk</strong></div>
                    <div>Save: <strong>100tk</strong></div>
                    <div>Validity: <strong>30 days</strong></div>
                </div>
                <div class="text-center mt-3">
                    <a href="#" class="p-2 bg-macaw-900 text-white rounded">Buy Now</a>
                </div>
                {{--            <div class="my-auto">--}}
                {{--                <i class="fa fa-home fa-5x"></i>--}}
                {{--            </div>--}}
            </div>
            <div class="p-6 bg-white rounded w-full shadow">
                <div class="leading-9">
                    <h4 class="text-lg font-bold">Family Pack</h4>
                    <div>Item Count: <strong>100 pcs</strong></div>
                    <div>Regular Price: <strong>1000 tk</strong></div>
                    <div>Package Price: <strong>900 tk</strong></div>
                    <div>Save: <strong>100tk</strong></div>
                    <div>Validity: <strong>30 days</strong></div>
                </div>
                <div class="text-center mt-3">
                    <a href="#" class="p-2 bg-macaw-900 text-white rounded">Buy Now</a>
                </div>
                {{--            <div class="my-auto">--}}
                {{--                <i class="fa fa-home fa-5x"></i>--}}
                {{--            </div>--}}
            </div>
            <div class="p-6 bg-white rounded shadow w-full">
                <div class="leading-9">
                    <h4 class="text-lg font-bold">Couple Pack</h4>
                    <div>Item Count: <strong>100 pcs</strong></div>
                    <div>Regular Price: <strong>1000 tk</strong></div>
                    <div>Package Price: <strong>900 tk</strong></div>
                    <div>Save: <strong>100tk</strong></div>
                    <div>Validity: <strong>30 days</strong></div>
                </div>
                <div class="text-center mt-3">
                    <a href="#" class="p-2 bg-macaw-900 text-white rounded">Buy Now</a>
                </div>
                {{--            <div class="my-auto">--}}
                {{--                <i class="fa fa-home fa-5x"></i>--}}
                {{--            </div>--}}
            </div>
        </div>
        @include('layouts.prices')
        @include('layouts.choose')
        <div class="service-name">
            <h2>Customer Reviews</h2>
        </div>
        <div id="reviews" class="grid grid-cols-1 sm:grid-cols-2 gap-3">
            <div class="shadow">
                <div class="py-3 md:pb-1 px-4 md:px-16 bg-white bg-opacity-40">
                    <div class="flex flex-wrap items-center">
                        <img class="mr-6" src="" alt="">
                        <h4 class="w-full md:w-auto text-xl font-heading font-medium">Faustina H. Fawn</h4>
                        <div class="w-full md:w-px h-2 md:h-8 mx-8 bg-transparent md:bg-gray-200"></div>
                        <span class="mr-4 text-xl font-heading font-medium">5.0</span>
                        <div class="inline-flex">
                            <a class="inline-block mr-1" href="#">
                                <svg width="20" height="20" viewbox="0 0 20 20" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20 7.91677H12.4167L10 0.416763L7.58333 7.91677H0L6.18335 12.3168L3.81668 19.5834L10 15.0834L16.1834 19.5834L13.8167 12.3168L20 7.91677Z"
                                        fill="#FFCB00"></path>
                                </svg>
                            </a>
                            <a class="inline-block mr-1" href="#">
                                <svg width="20" height="20" viewbox="0 0 20 20" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20 7.91677H12.4167L10 0.416763L7.58333 7.91677H0L6.18335 12.3168L3.81668 19.5834L10 15.0834L16.1834 19.5834L13.8167 12.3168L20 7.91677Z"
                                        fill="#FFCB00"></path>
                                </svg>
                            </a>
                            <a class="inline-block mr-1" href="#">
                                <svg width="20" height="20" viewbox="0 0 20 20" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20 7.91677H12.4167L10 0.416763L7.58333 7.91677H0L6.18335 12.3168L3.81668 19.5834L10 15.0834L16.1834 19.5834L13.8167 12.3168L20 7.91677Z"
                                        fill="#FFCB00"></path>
                                </svg>
                            </a>
                            <a class="inline-block mr-1" href="#">
                                <svg width="20" height="20" viewbox="0 0 20 20" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20 7.91677H12.4167L10 0.416763L7.58333 7.91677H0L6.18335 12.3168L3.81668 19.5834L10 15.0834L16.1834 19.5834L13.8167 12.3168L20 7.91677Z"
                                        fill="#FFCB00"></path>
                                </svg>
                            </a>
                            <a class="inline-block text-gray-200" href="#">
                                <svg width="20" height="20" viewbox="0 0 20 20" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20 7.91677H12.4167L10 0.416763L7.58333 7.91677H0L6.18335 12.3168L3.81668 19.5834L10 15.0834L16.1834 19.5834L13.8167 12.3168L20 7.91677Z"
                                        fill="#FFCB00"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="px-4 overflow-hidden md:px-16 bg-white">
                    <div class="flex flex-wrap">
                        <div class="w-full md:w-2/3 md:mb-0">
                            <p class="max-w-2xl leading-loose py-2">
                                I haretra neque non mi aliquam,
                                finibus hart bibendum molestie. Vestibulum suscipit sagittis dignissim mauris.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shadow">
                <div class="py-3 md:pb-1 px-4 md:px-16 bg-white bg-opacity-40">
                    <div class="flex flex-wrap items-center">
                        <img class="mr-6" src="" alt="">
                        <h4 class="w-full md:w-auto text-xl font-heading font-medium">Faustina H. Fawn</h4>
                        <div class="w-full md:w-px h-2 md:h-8 mx-8 bg-transparent md:bg-gray-200"></div>
                        <span class="mr-4 text-xl font-heading font-medium">5.0</span>
                        <div class="inline-flex">
                            <a class="inline-block mr-1" href="#">
                                <svg width="20" height="20" viewbox="0 0 20 20" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20 7.91677H12.4167L10 0.416763L7.58333 7.91677H0L6.18335 12.3168L3.81668 19.5834L10 15.0834L16.1834 19.5834L13.8167 12.3168L20 7.91677Z"
                                        fill="#FFCB00"></path>
                                </svg>
                            </a>
                            <a class="inline-block mr-1" href="#">
                                <svg width="20" height="20" viewbox="0 0 20 20" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20 7.91677H12.4167L10 0.416763L7.58333 7.91677H0L6.18335 12.3168L3.81668 19.5834L10 15.0834L16.1834 19.5834L13.8167 12.3168L20 7.91677Z"
                                        fill="#FFCB00"></path>
                                </svg>
                            </a>
                            <a class="inline-block mr-1" href="#">
                                <svg width="20" height="20" viewbox="0 0 20 20" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20 7.91677H12.4167L10 0.416763L7.58333 7.91677H0L6.18335 12.3168L3.81668 19.5834L10 15.0834L16.1834 19.5834L13.8167 12.3168L20 7.91677Z"
                                        fill="#FFCB00"></path>
                                </svg>
                            </a>
                            <a class="inline-block mr-1" href="#">
                                <svg width="20" height="20" viewbox="0 0 20 20" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20 7.91677H12.4167L10 0.416763L7.58333 7.91677H0L6.18335 12.3168L3.81668 19.5834L10 15.0834L16.1834 19.5834L13.8167 12.3168L20 7.91677Z"
                                        fill="#FFCB00"></path>
                                </svg>
                            </a>
                            <a class="inline-block text-gray-200" href="#">
                                <svg width="20" height="20" viewbox="0 0 20 20" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20 7.91677H12.4167L10 0.416763L7.58333 7.91677H0L6.18335 12.3168L3.81668 19.5834L10 15.0834L16.1834 19.5834L13.8167 12.3168L20 7.91677Z"
                                        fill="#FFCB00"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="px-4 overflow-hidden md:px-16 bg-white">
                    <div class="flex flex-wrap">
                        <div class="w-full md:w-2/3 md:mb-0">
                            <p class="max-w-2xl leading-loose py-2">
                                I haretra neque non mi aliquam,
                                finibus hart bibendum molestie. Vestibulum suscipit sagittis dignissim mauris.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shadow">
                <div class="py-3 md:pb-1 px-4 md:px-16 bg-white bg-opacity-40">
                    <div class="flex flex-wrap items-center">
                        <img class="mr-6" src="" alt="">
                        <h4 class="w-full md:w-auto text-xl font-heading font-medium">Faustina H. Fawn</h4>
                        <div class="w-full md:w-px h-2 md:h-8 mx-8 bg-transparent md:bg-gray-200"></div>
                        <span class="mr-4 text-xl font-heading font-medium">5.0</span>
                        <div class="inline-flex">
                            <a class="inline-block mr-1" href="#">
                                <svg width="20" height="20" viewbox="0 0 20 20" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20 7.91677H12.4167L10 0.416763L7.58333 7.91677H0L6.18335 12.3168L3.81668 19.5834L10 15.0834L16.1834 19.5834L13.8167 12.3168L20 7.91677Z"
                                        fill="#FFCB00"></path>
                                </svg>
                            </a>
                            <a class="inline-block mr-1" href="#">
                                <svg width="20" height="20" viewbox="0 0 20 20" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20 7.91677H12.4167L10 0.416763L7.58333 7.91677H0L6.18335 12.3168L3.81668 19.5834L10 15.0834L16.1834 19.5834L13.8167 12.3168L20 7.91677Z"
                                        fill="#FFCB00"></path>
                                </svg>
                            </a>
                            <a class="inline-block mr-1" href="#">
                                <svg width="20" height="20" viewbox="0 0 20 20" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20 7.91677H12.4167L10 0.416763L7.58333 7.91677H0L6.18335 12.3168L3.81668 19.5834L10 15.0834L16.1834 19.5834L13.8167 12.3168L20 7.91677Z"
                                        fill="#FFCB00"></path>
                                </svg>
                            </a>
                            <a class="inline-block mr-1" href="#">
                                <svg width="20" height="20" viewbox="0 0 20 20" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20 7.91677H12.4167L10 0.416763L7.58333 7.91677H0L6.18335 12.3168L3.81668 19.5834L10 15.0834L16.1834 19.5834L13.8167 12.3168L20 7.91677Z"
                                        fill="#FFCB00"></path>
                                </svg>
                            </a>
                            <a class="inline-block text-gray-200" href="#">
                                <svg width="20" height="20" viewbox="0 0 20 20" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20 7.91677H12.4167L10 0.416763L7.58333 7.91677H0L6.18335 12.3168L3.81668 19.5834L10 15.0834L16.1834 19.5834L13.8167 12.3168L20 7.91677Z"
                                        fill="#FFCB00"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="px-4 overflow-hidden md:px-16 bg-white">
                    <div class="flex flex-wrap">
                        <div class="w-full md:w-2/3 md:mb-0">
                            <p class="max-w-2xl leading-loose py-2">
                                I haretra neque non mi aliquam,
                                finibus hart bibendum molestie. Vestibulum suscipit sagittis dignissim mauris.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shadow">
                <div class="py-3 md:pb-1 px-4 md:px-16 bg-white bg-opacity-40">
                    <div class="flex flex-wrap items-center">
                        <img class="mr-6" src="" alt="">
                        <h4 class="w-full md:w-auto text-xl font-heading font-medium">Faustina H. Fawn</h4>
                        <div class="w-full md:w-px h-2 md:h-8 mx-8 bg-transparent md:bg-gray-200"></div>
                        <span class="mr-4 text-xl font-heading font-medium">5.0</span>
                        <div class="inline-flex">
                            <a class="inline-block mr-1" href="#">
                                <svg width="20" height="20" viewbox="0 0 20 20" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20 7.91677H12.4167L10 0.416763L7.58333 7.91677H0L6.18335 12.3168L3.81668 19.5834L10 15.0834L16.1834 19.5834L13.8167 12.3168L20 7.91677Z"
                                        fill="#FFCB00"></path>
                                </svg>
                            </a>
                            <a class="inline-block mr-1" href="#">
                                <svg width="20" height="20" viewbox="0 0 20 20" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20 7.91677H12.4167L10 0.416763L7.58333 7.91677H0L6.18335 12.3168L3.81668 19.5834L10 15.0834L16.1834 19.5834L13.8167 12.3168L20 7.91677Z"
                                        fill="#FFCB00"></path>
                                </svg>
                            </a>
                            <a class="inline-block mr-1" href="#">
                                <svg width="20" height="20" viewbox="0 0 20 20" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20 7.91677H12.4167L10 0.416763L7.58333 7.91677H0L6.18335 12.3168L3.81668 19.5834L10 15.0834L16.1834 19.5834L13.8167 12.3168L20 7.91677Z"
                                        fill="#FFCB00"></path>
                                </svg>
                            </a>
                            <a class="inline-block mr-1" href="#">
                                <svg width="20" height="20" viewbox="0 0 20 20" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20 7.91677H12.4167L10 0.416763L7.58333 7.91677H0L6.18335 12.3168L3.81668 19.5834L10 15.0834L16.1834 19.5834L13.8167 12.3168L20 7.91677Z"
                                        fill="#FFCB00"></path>
                                </svg>
                            </a>
                            <a class="inline-block text-gray-200" href="#">
                                <svg width="20" height="20" viewbox="0 0 20 20" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20 7.91677H12.4167L10 0.416763L7.58333 7.91677H0L6.18335 12.3168L3.81668 19.5834L10 15.0834L16.1834 19.5834L13.8167 12.3168L20 7.91677Z"
                                        fill="#FFCB00"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="px-4 overflow-hidden md:px-16 bg-white">
                    <div class="flex flex-wrap">
                        <div class="w-full md:w-2/3 md:mb-0">
                            <p class="max-w-2xl leading-loose py-2">
                                I haretra neque non mi aliquam,
                                finibus hart bibendum molestie. Vestibulum suscipit sagittis dignissim mauris.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.about')
        @include('layouts.contact')
    </div>
@endsection
