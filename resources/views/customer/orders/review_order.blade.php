@extends('layouts.customer')
@php
    $services = \App\Models\Service::with('laundry_type')->get();
@endphp
@section('content')
    <Customer-Order-Review :cart="{{json_encode(request()->session()->get('cart'))}}"
                           :services="{{json_encode($services ?? [])}}"
                           route="{{route('orders.store')}}"
                           :user="{{json_encode(Auth::user())}}"
                           edit_profile="{{route('address.edit',['redirect' => 'review_order'])}}"
    >
        <form method="post" action="{{route('orders.store')}}" class="bg-gray-50 p-4 mt-6 rounded shadow">
            @csrf
            <div class="flex justify-around items-center w-full space-x-4">
                <a class="w-full text-center mt-6 md:mt-0 py-5 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 border border-gray-800 font-medium text-base font-medium leading-4 text-gray-800"
                   href="{{route('orders.create')}}"
                >
                    Edit Cart
                </a>
                <button
                    class="w-full mt-6 md:mt-0 py-5 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 border border-gray-800 font-medium text-base font-medium leading-4 text-gray-800"
                >
                    Place Order
                </button>
            </div>
        </form>
    </Customer-Order-Review>

@endsection
