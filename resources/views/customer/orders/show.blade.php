@extends('layouts.customer')

@section('content')
    <section class="m-3">
        <div class="font-bold text-2xl">Order #{{$order->id}}</div>
        <div class="text-gray-600">{{$order->created_at}}</div>
        <div class="flex flex-col px-4 py-6 mt-4 md:p-6 xl:p-8 w-full bg-gray-50 space-y-6 rounded shadow">
            <h3 class="text-lg  font-semibold leading-5 text-gray-800">Summary</h3>
            <div
                class="flex justify-center items-center w-full space-y-4 flex-col border-gray-200 border-b pb-4">
                <div class="flex justify-between w-full">
                    <p class="text-base  leading-4 text-gray-800">Subtotal</p>
                    <p class="text-base -300 leading-4 text-gray-600">${{ $order->total }}</p>
                </div>
                <div class="flex justify-between items-center w-full">
                    <p class="text-base  leading-4 text-gray-800">
                        Discount
                    </p>
                    <p class="text-base -300 leading-4 text-gray-600">-$0.00</p>
                </div>
                <div class="flex justify-between items-center w-full">
                    <p class="text-base  leading-4 text-gray-800">Delivery Charge</p>
                    <p class="text-base -300 leading-4 text-gray-600">$0.00</p>
                </div>
            </div>
            <div class="flex justify-between items-center w-full">
                <p class="text-base  font-semibold leading-4 text-gray-800">Total</p>
                <p class="text-base -300 font-semibold leading-4 text-gray-600">
                    ${{ $order->total }}
                </p>
            </div>
        </div>
        <div class="my-3 px-3 py-1 bg-gray-50 rounded shadow">
            @foreach($order->laundries as $laundry)
                <div
                    class="md:mt-6 flex flex-col md:flex-row justify-start items-start md:items-center md:space-x-6 xl:space-x-8 w-full">
                    <!--<div class="pb-4 md:pb-8 w-full md:w-40">-->
                    <!--<img alt="dress" class="w-full hidden md:block"-->
                    <!--src="https://i.ibb.co/84qQR4p/Rectangle-10.png"/>-->
                    <!--<img alt="dress" class="w-full md:hidden"-->
                    <!--src="https://i.ibb.co/L039qbN/Rectangle-10.png"/>-->
                    <!--</div>-->
                    <div
                        class="{{ !$loop->last?'border-b':'' }} border-gray-200 md:flex-row flex-col flex justify-between items-start w-full pb-3 space-y-4 md:space-y-0">
                        <div class="w-full flex flex-col justify-start items-start space-y-2">
                            <h3 class="text-xl xl:text-xl font-semibold leading-6 text-gray-800">
                                {{ $laundry->laundry_type->name }}
                            </h3>
                            <div class="flex justify-start items-start flex-col space-y-2">
                                <p class="text-sm  leading-none text-gray-800">
                                            <span class="-400 text-gray-600">
                                                Service:
                                            </span>
                                    {{ $laundry->service->name }}
                                </p>
                            </div>
                        </div>
                        <div class="flex justify-between space-x-8 items-start w-full">
                            <p class="text-base  xl:text-md leading-6">
                                        <span class="-400 text-gray-600">
                                                Unit Price:
                                        </span>
                                ${{ $laundry->price }}
                                <!--<span class="text-red-300 line-through"> $45.00</span>-->
                            </p>
                            <p class="text-base  xl:text-md leading-6 text-gray-800">
                                        <span class="-400 text-gray-600">
                                                Qty:
                                        </span>
                                {{ $laundry->amount }}</p>
                            <p class="text-base  xl:text-md font-semibold leading-6 text-gray-800">
                                ${{ $laundry->subtotal }}
                            </p>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </section>
@endsection
