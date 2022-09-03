@extends('layouts.customer')
@php
    $categories = \App\Models\Category::with('laundry_types')->get();
    $customers = \App\Models\Customer::all()->keyBy('id');
@endphp
@section('content')
    <div class="container my-4">
        <form action="{{route('order.store')}}" class="" method="post">
            @csrf
            <div class="row">
                <Customer-Order-Fields :categories="{{$categories ?? '[]'}}"></Customer-Order-Fields>
            </div>
            <button class="btn btn-primary">Order</button>
        </form>


    </div>
@endsection
