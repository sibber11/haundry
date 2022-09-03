@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-4">
                    <h1>Orders</h1>
                </div>
                <div class="col-sm-8">
                    <a class="btn btn-primary float-right"
                       href="{{ route('admin.orders.create') }}">
                        Add New
                    </a>
                    @php
                        $missions = \App\Models\Mission::pending()->get();
                    @endphp
                    <form action="{{route('admin.missions.assign_orders')}}" method="post" class="row" id="assign-form">
                        @csrf
                        <select name="mission_id" class="form-control col-sm-7">
                            @foreach($missions as $mission)
                                <option value="{{$mission->id}}">{{$mission->id}}</option>
                            @endforeach
                        </select>
                        <br></br>
                        <button class="btn btn-default col-sm-5">Assign to Mission</button>
                    </form>
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
