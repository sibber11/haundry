@extends('layouts.customer')

@php
    $user = auth('customer')->user();
@endphp

@section('content')
    <div class="m-4">
        <h3 class="">Buy this Package and save <strong>{{ $package->points - $package->price}}</strong></h3>
        <form action="{{route('buy_package', $package)}}" method="post">
            @csrf
            <div>
                <label for="">Name: </label>
                <div>{{$package->name}}</div>
            </div>
            <div>
                <label for="">Points: </label>
                <div>{{$package->points}}</div>
            </div>
            <div>
                <label for="">Price: </label>
                <div>{{$package->price}}</div>
            </div>
            <div>
                <select name="payment" id="payment" required>
                    <option value="">Choose a Payment Method...</option>
                    <option value="bkash">BKash</option>
                    <option value="nagad">Nagad</option>
                    <option value="Rocket">Rocket</option>
                </select>
            </div>
            <button class="px-2 py-1 bg-macaw-900 border-2 rounded">Buy</button>
        </form>
    </div>
@endsection
