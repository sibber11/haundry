@extends('layouts.customer')

@php
    $user = auth('customer')->user();
@endphp

@section('content')
    <div class="m-4">
        <div class="">
            You Have {{$user->point->total}} point.
        </div>
        <div>You can spend your point to claim voucher</div>

        <form action="{{route('claim_voucher')}}" method="post" class="flex">
            @csrf
            <select name="" id="" class="w-full">
                <option value="">Select point amount...</option>
                <option value="" {{$user->can_claim_voucher?'':'disabled'}}>200</option>
                <option value="" {{$user->can_claim_voucher?'':'disabled'}}>500</option>
                <option value="" {{$user->can_claim_voucher?'':'disabled'}}>1000</option>
                <option value="" {{$user->can_claim_voucher?'':'disabled'}}>5000</option>
                <option value="" {{$user->can_claim_voucher?'':'disabled'}}>10000</option>
            </select>
            <button class="w-full" name="amount" value="200">
                Claim Voucher
            </button>
        </form>
        <div class="mt-8 mb-4 font-bold text-lg">
            Available vouchers
            {{--            <a href="#" class="">help</a>--}}
        </div>
        <ul class="">
            {{--                    @dd($user->vouchers)--}}
            @foreach($user->vouchers as $voucher)
                <li class="inline p-2 m-2 rounded bg-macaw-900 text-white">{{$voucher->code}}</li>
            @endforeach
            @if($user->vouchers->isEmpty())
                You Have no vouchers!
            @endif
        </ul>
    </div>
@endsection
