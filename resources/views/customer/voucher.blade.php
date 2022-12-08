@extends('layouts.customer')

@php
    $user = auth('customer')->user();
@endphp

@section('content')
    <div class="m-4">
        <h2 class="font-bold text-lg p-2 m-2">
            Available Points
        </h2>
        <div class="p-2 m-2">
            You Have {{$user->point->total}} point.
        </div>
        <h2 class="font-bold text-lg p-2 m-2">
            Available vouchers
        </h2>
        <div>
            @foreach($user->vouchers as $voucher)
                <div class="border-2 m-4 p-2 bg-white rounded shadow">
                    <div>Code: <strong>{{$voucher->code}}</strong></div>
                    <div>Discount: {{$voucher->discount}}</div>
                    <span class="text-sm">*Applicable on only order over {{$voucher->minimum}}</span>
                </div>
            @endforeach
            @if($user->vouchers->isEmpty())
                You Have no vouchers!
            @endif
        </div>
    </div>
@endsection
