@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-4">
                    <h1>Orders</h1>
                </div>
                <div class="col-sm-8">
                    {{--                    <a class="btn btn-primary float-right"--}}
                    {{--                       href="{{ route('admin.orders.create') }}">--}}
                    {{--                        Add New--}}
                    {{--                    </a>--}}
                    @if(request()->routeIs('admin.orders.index') && Request::has('filter'))
                        @if(in_array(Request::input('filter'), ['pickable', 'deliverable']))
                            @php
                                $missions = \App\Models\Mission::pending()->get();
                            @endphp
                            <form action="{{route('admin.missions.assign_orders')}}" method="post" class="row"
                                  id="assign-form">
                                @csrf
                                <div class="input-group col-sm-9">
                                    <select name="mission_id" class="form-control" required>
                                        <option value="">Select mission...</option>
                                        @foreach($missions as $mission)
                                            <option value="{{$mission->id}}">{{$mission->id}} ({{$mission->user->name}})
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <a href="{{route('admin.missions.create')}}"
                                           class="btn btn-default">
                                            New Mission
                                        </a>
                                    </div>
                                </div>

                                <button class="btn btn-default col-sm-3">Assign</button>
                            </form>
                        @endif
                        @if(Request::input('filter') == 'operable')
                            <form action="{{route('admin.orders.update_status')}}" id="assign-form" method="post">
                                @csrf
                                <button class="btn btn-default float-right mr-2" value="operated" name="status">
                                    Mark Operated
                                </button>
                            </form>
                        @endif
                        @if(Request::input('filter') == 'new')
                            <form action="{{route('admin.orders.update_status')}}" id="assign-form" method="post">
                                @csrf
                                <button class="btn btn-default float-right mr-2" value="confirmed" name="status">
                                    Confirm Orders
                                </button>
                            </form>
                        @endif
                    @endif

                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            @include('admin.orders.table')
        </div>
    </div>

@endsection
