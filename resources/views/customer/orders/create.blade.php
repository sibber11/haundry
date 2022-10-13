@extends('layouts.customer')
@php
    $categories = \App\Models\Category::with('laundry_types')->get();
    $customers = \App\Models\Customer::all()->keyBy('id');
@endphp
@section('content')
    {{--    {{$errors}}--}}

    <form action="{{route('orders.store')}}" method="post" class="m-2">
        @csrf
        <Customer-Order-Fields :categories="{{$categories ?? '[]'}}"></Customer-Order-Fields>
        <button class="w-full sm:w-auto leading-none text-gray-50 p-3 mt-4 border-0 bg-macaw-900 rounded">Order</button>
    </form>
@endsection
