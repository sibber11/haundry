@extends('layouts.customer')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <ul class="nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link">Personal Information</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('order.index')}}" class="nav-link">Orders</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('voucher')}}" class="nav-link">Vouchers & Points</a>
                    </li>
                    {{--                    <li class="nav-item">--}}
                    {{--                        <a href="#" class="nav-link"></a>--}}
                    {{--                    </li>--}}
                </ul>
            </div>
            @if(session('status'))
                ola
            @endif
            <div class="col-sm-9">
                <div class="card my-2">

                    @php
                        $customer = auth('customer')->user();
                    @endphp

                    {!! Form::model($customer, ['route' => ['customer.update_profile'], 'method' => 'patch']) !!}

                    <div class="card-body">
                        <div class="row">
                            @include('admin.customers.fields')
                        </div>
                    </div>

                    <div class="card-footer">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                        <a href="{{ route('admin.customers.index') }}" class="btn btn-default"> Cancel </a>
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection
