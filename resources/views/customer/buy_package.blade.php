@extends('layouts.customer')

@php
    $user = auth('customer')->user();
@endphp

@section('content')
    <div class="m-4">
        <h3 class="text-2xl p-2">Buy this Package and save <strong>{{ $package->points - $package->price}}</strong></h3>
        <form action="{{route('buy_package', $package)}}" method="post">
            @csrf
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
            <div class="p-2">
                <select name="payment" id="payment" required>
                    <option value="">Choose a Payment Method...</option>
                    <option value="bkash">BKash</option>
                    <option value="nagad">Nagad</option>
                    <option value="Rocket">Rocket</option>
                </select>
            </div>
            <div class="p-2">
                <label for="trxid">Transaction ID:</label>
                <br>
                <input type="text" name="trxid" id="trxid" class="p-1" required>
            </div>
            <div class="p-2">
                <button class="px-2 py-1 bg-macaw-900 border-2 rounded">Buy</button>
            </div>
        </form>
    </div>
@endsection
