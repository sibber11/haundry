@extends('admin.layouts.app')
@php
    $total_users = \App\Models\Customer::count();
    $total_orders = \App\Models\Order::count();
    $new_users = \App\Models\Customer::where('created_at', '>=', now()->subDays(7))->count();
    $new_orders = \App\Models\Order::where('created_at', '>=', now()->subDays(7))->count();
    $request_call = \App\Models\RequestCall::pending()->get();
    $missions = \App\Models\Mission::running()->orWhere->pending()->get();
@endphp
@section('content')
    <div class="container-fluid">
        <div class="row my-4">
            <div class="col-lg-3 col-6">

                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$new_orders}}</h3>
                        <p>New Orders</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-bus"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">

                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$total_users}}</h3>
                        <p>Total Customers</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-stalker"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">

                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$total_orders}}</h3>
                        <p>Total Orders</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">

                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$new_users}}</h3>
                        <p>New Customers</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="m-4 card">
        <div class="card-header">
            <h1>Call Requests</h1>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th style="width: 150px">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($request_call as $call)
                    <tr>
                        <td>{{$call->name}}</td>
                        <td>{{$call->phone}}</td>
                        <td>
                            <a href="{{route('admin.markdone', $call)}}">Mark Done</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="m-4 card">
        <div class="card-header">
            <h1>Running Missions</h1>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Mission ID</th>
                    <th>Rider Name</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($missions as $mission)
                    <tr>
                        <td>{{$mission->id}}</td>
                        <td>{{$mission->missions}}</td>
                        <td>
                            {{$mission->deadline}}
                            {{--                        <a href="{{route('admin.markdone', $call)}}">Mark Done</a>--}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('third_party_stylesheets')
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endpush

@push('page_scripts')
    <script>
        // $(document).Toasts('create', {
        //     title: 'New Request Call',
        //     body: 'Name: Sibber\n Phone: +8801815979207',
        //     position: 'bottomRight'
        // })
    </script>
@endpush
