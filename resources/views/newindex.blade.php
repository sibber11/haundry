<!doctype html>
{{--3ec1c9--}}
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}}</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
          integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
          crossorigin="anonymous"/>
</head>
<body class="bg-gray-200">
@include('layouts.nav')
<div id="app" class="m-4">
    <div>
        <img src="" alt="">
        <div class="-z-50 w-full max-h-1 overflow-visible mx-auto">
            <div style="width: 924px; height: 330px" class="bg-fuchsia-300">
                &nbsp;
            </div>
        </div>
        <h1 class="text-4xl p-4">Dry Clean &<br>Laundry Service</h1>
        <h5 class="text-sm p-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium.</h5>
        <div id="call">
            <form method="post" class="flex flex-col gap-1 max-w-min p-4">
                <input type="text" placeholder="Your name here..." class="p-1.5 rounded">
                <input type="text" placeholder="Your number here..." class="p-1.5 rounded">
                <button class="rounded bg-macaw-900 px-2 py-1 text-white">Request a Call</button>
            </form>
        </div>
    </div>
    <div class="flex-col-row-gap">
        <div id="refer" class="text-center text-white p-2 bg-macaw-900 text-2xl shadow align-middle">
            <h2>Refer a Friend <br>&<br> Get 20% Off First Order.</h2>
        </div>
        <div class="flex flex-col w-full justify-between">
            <div class="service-name">
                <h2>Our Services</h2>
            </div>
            <div id="services" class="bg-white text-center grid grid-cols-2 sm:grid-cols-4 justify-between py-5 shadow">
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
    <div id="packages" class="flex-col-row-gap justify-around">
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
        <div class="p-6 bg-white rounded w-full shadow-2xl ">
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
    <div class="service-name">
        <h2>Prices</h2>
    </div>
    <div id="price" class="flex-col-row-gap justify-between">
        <div class="border-b border-gray-200 shadow px-3 bg-white">
            <table class="divide-y divide-gray-300">
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-2 text-s text-gray-500">
                        Product Name
                    </th>
                    <th class="px-6 py-2 text-s text-gray-500">
                        Iron Price
                    </th>
                    <th class="px-6 py-2 text-s text-gray-500">
                        Wash Price
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-300">
                <tr class="whitespace-nowrap">
                    <td class="px-6 py-4 text-center">
                        T-Shirt
                    </td>
                    <td class="px-6 py-4 text-center">
                        10
                    </td>
                    <td class="px-6 py-4 text-center">
                        25
                    </td>
                </tr>
                <tr class="whitespace-nowrap">
                    <td class="px-6 py-4 text-center">
                        T-Shirt
                    </td>
                    <td class="px-6 py-4 text-center">
                        10
                    </td>
                    <td class="px-6 py-4 text-center">
                        25
                    </td>
                </tr>
                <tr class="whitespace-nowrap">
                    <td class="px-6 py-4 text-center">
                        T-Shirt
                    </td>
                    <td class="px-6 py-4 text-center">
                        10
                    </td>
                    <td class="px-6 py-4 text-center">
                        25
                    </td>
                </tr>
                <tr class="whitespace-nowrap">
                    <td class="px-6 py-4 text-center">
                        T-Shirt
                    </td>
                    <td class="px-6 py-4 text-center">
                        10
                    </td>
                    <td class="px-6 py-4 text-center">
                        25
                    </td>
                </tr>
                <tr class="whitespace-nowrap">
                    <td class="px-6 py-4 text-center">
                        T-Shirt
                    </td>
                    <td class="px-6 py-4 text-center">
                        10
                    </td>
                    <td class="px-6 py-4 text-center">
                        25
                    </td>
                </tr>
                <tr class="whitespace-nowrap">
                    <td class="px-6 py-4 text-center">
                        T-Shirt
                    </td>
                    <td class="px-6 py-4 text-center">
                        10
                    </td>
                    <td class="px-6 py-4 text-center">
                        25
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="border-b border-gray-200 shadow px-3 bg-white">
            <table class="divide-y divide-gray-300">
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-2 text-s text-gray-500">
                        Product Name
                    </th>
                    <th class="px-6 py-2 text-s text-gray-500">
                        Iron Price
                    </th>
                    <th class="px-6 py-2 text-s text-gray-500">
                        Wash Price
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-300">
                <tr class="whitespace-nowrap">
                    <td class="px-6 py-4 text-center">
                        T-Shirt
                    </td>
                    <td class="px-6 py-4 text-center">
                        10
                    </td>
                    <td class="px-6 py-4 text-center">
                        25
                    </td>
                </tr>
                <tr class="whitespace-nowrap">
                    <td class="px-6 py-4 text-center">
                        T-Shirt
                    </td>
                    <td class="px-6 py-4 text-center">
                        10
                    </td>
                    <td class="px-6 py-4 text-center">
                        25
                    </td>
                </tr>
                <tr class="whitespace-nowrap">
                    <td class="px-6 py-4 text-center">
                        T-Shirt
                    </td>
                    <td class="px-6 py-4 text-center">
                        10
                    </td>
                    <td class="px-6 py-4 text-center">
                        25
                    </td>
                </tr>
                <tr class="whitespace-nowrap">
                    <td class="px-6 py-4 text-center">
                        T-Shirt
                    </td>
                    <td class="px-6 py-4 text-center">
                        10
                    </td>
                    <td class="px-6 py-4 text-center">
                        25
                    </td>
                </tr>
                <tr class="whitespace-nowrap">
                    <td class="px-6 py-4 text-center">
                        T-Shirt
                    </td>
                    <td class="px-6 py-4 text-center">
                        10
                    </td>
                    <td class="px-6 py-4 text-center">
                        25
                    </td>
                </tr>
                <tr class="whitespace-nowrap">
                    <td class="px-6 py-4 text-center">
                        T-Shirt
                    </td>
                    <td class="px-6 py-4 text-center">
                        10
                    </td>
                    <td class="px-6 py-4 text-center">
                        25
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="text-center py-2">
        <a href="#" class="bg-macaw-900 p-2 rounded text-white">Show More</a>
    </div>
    <div class="service-name">
        <h2>Why choose us?</h2>
    </div>
    <div id="choose" class="grid grid-cols-1 md:grid-cols-2 gap-3">
        <div class="bg-white p-4 text-justify shadow">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, ducimus, in! A adipisci aperiam
            blanditiis, consequatur consequuntur dolor enim eum labore libero repellendus sint soluta, suscipit
            tempora, ut velit vitae?
        </div>
        <div class="bg-white p-4 text-justify shadow">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda atque blanditiis deleniti deserunt,
            dolore ducimus enim, expedita ipsum iste labore, laborum minima perferendis praesentium quaerat quas
            quia sequi tenetur ut!
        </div>
        <div class="bg-white p-4 text-justify shadow">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            Beatae error iste
            magnam
            nihil odit optio
            repellat rerum similique ullam velit? Assumenda delectus eos excepturi magni odit reiciendis, veniam
            vero! At!
        </div>
        <div class="bg-white p-4 text-justify shadow">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A
            dolore dolorem
            explicabo
            fuga illum, iure
            nisi pariatur quis ullam. Ad alias ea eveniet fugit illo illum laboriosam qui ratione repudiandae.
        </div>
    </div>
    <div class="service-name">
        <h2>
            Customer Reviews
        </h2>
    </div>
    <div id="reviews" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div class="mb-2 shadow">
            <div class="pt-3 pb-3 md:pb-1 px-4 md:px-16 bg-white bg-opacity-40">
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
        <div class="mb-2 shadow">
            <div class="pt-3 pb-3 md:pb-1 px-4 md:px-16 bg-white bg-opacity-40">
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
        <div class="mb-2 shadow">
            <div class="pt-3 pb-3 md:pb-1 px-4 md:px-16 bg-white bg-opacity-40">
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
        <div class="mb-2 shadow">
            <div class="pt-3 pb-3 md:pb-1 px-4 md:px-16 bg-white bg-opacity-40">
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
</div>
</body>
{{--<script src="{{mix('js/app.js')}}"></script>--}}
</html>
