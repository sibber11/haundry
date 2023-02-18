@php
    use App\Models\Customer;
    use App\Models\Order;
    use App\Models\RequestCall;
    use App\Models\Mission;
@endphp
@extends('admin.layouts.app')
@php
    $total_users = Customer::count();
    $total_orders = Order::count();
    $new_users = Customer::where('created_at', '>=', now()->subDays(7))->count();
    $new_orders = Order::new()->count();
    $request_call = RequestCall::orderBy('created_at', 'desc')->orderBy('called')->limit(5)->get();
    $missions = Mission::running()->orWhere->pending()->limit(10)->get();
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

                    <a href="{{route('admin.orders.index', ['filter' => 'new'])}}" class="small-box-footer">More info <i

                            class="fa fa-arrow-circle-right"></i></a>
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

                    <a href="{{route('admin.customers.index')}}" class="small-box-footer">More info
                        <i class="fa fa-arrow-circle-right"></i>
                    </a>
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
                    <a href="{{route('admin.orders.index')}}" class="small-box-footer">More info <i
                            class="fa fa-arrow-circle-right"></i></a>
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
                    <a href="{{route('admin.customers.index')}}" class="small-box-footer">More info <i
                            class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="my-4 card mx-2">
        <div class="card-header">
            <h1>Call Requests</h1>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Status</th>
                    <th style="width: 200px">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($request_call as $call)
                    <tr @class(["text-warning"=> !$call->called])>
                        <td>{{$call->name}}</td>
                        <td>{{$call->phone}}</td>
                        <td>{{$call->called ? 'Called':'Pending'}}</td>
                        <td>
                            <form action="{{route('admin.markdone', $call)}}" class="d-inline" method="post">
                                @csrf
                                @method('patch')
                                <button @disabled($call->called) class="btn btn-primary">
                                    <i class="fas fa-check"></i>
                                </button>
                            </form>
                            <form action="{{route('admin.requestCall.destroy', $call)}}" class="d-inline" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="my-4 card mx-2">
        <div class="card-header">
            <h1>Running Missions</h1>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Mission ID</th>
                    <th>Rider Name</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($missions as $mission)
                    <tr>
                        <td>{{$mission->id}}</td>
                        <td>{{$mission->user->name}}</td>
                        <td>{{$mission->status}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('third_party_stylesheets')
    {{--    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">--}}
@endpush

@push('page_scripts')
@endpush
