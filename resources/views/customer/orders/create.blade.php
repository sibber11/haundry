@extends('layouts.customer')
@php
    $categories = \App\Models\Category::with('laundry_types')->get();
    $customers = \App\Models\Customer::all()->keyBy('id');
@endphp
@section('content')
    <form action="{{route('orders.store')}}" method="post" class="m-2">
        @csrf
        <Customer-Order-Fields :categories="{{$categories ?? '[]'}}"></Customer-Order-Fields>
        <button class="bg-macaw-900 py-1 px-2 rounded my-4">Order</button>
    </form>
@endsection
