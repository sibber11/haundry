@extends('layouts.customer')

@php
    $user = auth('customer')->user();
@endphp

@section('content')
    <div class="m-4 bg-white shadow rounded p-2">
        <h3 class="text-2xl p-2 font-bold">Buy this Package and save
            <strong>{{ $package->points - $package->price}}</strong></h3>
        <div class="p-2">
            <label for="">Name: </label>
            <span>{{$package->name}}</span>
        </div>
        <div class="p-2">
            <label for="">Points: </label>
            <span>{{$package->points}}</span>
        </div>
        <div class="p-2">
            <label for="">Price: </label>
            <span>{{$package->price}}</span>
        </div>
        <p class="p-2">Plz Contact us to get the package.</p>
        <p class="p-2">Phone: </p>
        <p class="p-2">Email: </p>
    </div>
@endsection
