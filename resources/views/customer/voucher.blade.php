@extends('layouts.customer')

@php
    $user = auth('customer')->user();
@endphp

@section('content')
    <div class="container">
        <div class="card my-2">
            <div class="card-header">
                Available vouchers <a href="#" class="badge">help</a>
            </div>
            <div class="card-body">
                <ul>
                    {{--                    @dd($user->vouchers)--}}
                    @foreach($user->vouchers as $voucher)
                        <li>{{$voucher->code}}</li>
                    @endforeach
                    @if($user->vouchers->isEmpty())
                        You Have no vouchers!
                    @endif
                </ul>
            </div>
        </div>
        <div class="card my-2">
            <div class="card-header">
                You Have {{$user->point->total}} point.
            </div>
            <div class="card-body">
                <form action="{{route('claim_voucher')}}" method="post">
                    @csrf
                    <button class="btn btn-primary"
                            {{$user->can_claim_voucher?'':'disabled'}} name="amount" value="200">
                        Claim for 200 point
                    </button>
                    <button class="btn btn-primary"
                            {{$user->can_claim_voucher?'':'disabled'}} name="amount" value="200">
                        Claim for 300 point
                    </button>
                    <button class="btn btn-primary"
                            {{$user->can_claim_voucher?'':'disabled'}} name="amount" value="200">
                        Claim for 400 point
                    </button>
                    <button class="btn btn-primary"
                            {{$user->can_claim_voucher?'':'disabled'}} name="amount" value="200">
                        Claim for 500 point
                    </button>

                </form>

            </div>
        </div>
    </div>
@endsection
