@extends('layouts.customer')
@php
    $services = \App\Models\Service::with('laundry_type')->get();
@endphp
@section('content')
    {{--    {{$errors}}--}}

    <Customer-Order-Fields :services="{{$services ?? '[]'}}" route="{{route('save_cart')}}"
                           :cart="{{json_encode(request()->session()->get('cart')) ?? []}}"
                           class="mx-3"
    >
        @csrf
    </Customer-Order-Fields>
@endsection
