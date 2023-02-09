@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-4">
                    <h1>Incomes for year 2022</h1>
                </div>
                <div class="col-sm-8">
                    <form>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Year</span>
                            </div>
                            @php
                                $years = \App\Models\Order::selectRaw('distinct year(updated_at) as year')->get();
                                $months= \App\Models\Order::selectRaw('distinct month(updated_at) as month')->get();
//                                dd($years);

                            @endphp
                            <select name="year" id="year-select" class="form-control d-inline">
                                <option value=''>--Select Year--</option>
                                @foreach($years as $year)
                                    <option
                                        @if(request()->input('year') == $year->year) selected
                                        @endif value="{{$year->year}}">{{$year->year}}</option>
                                @endforeach
                            </select>
                            <div class="input-group-prepend">
                                <span class="input-group-text">Month</span>
                            </div>
                            <select id='month-select' class="form-control d-inline" name="month">
                                <option value=''>--Select Month--</option>
                                @foreach($months as $month)
                                    <option @if(request()->input('month') == $month->month) selected
                                            @endif value="{{$month->month}}">{{DateTime::createFromFormat('!m', $month->month)->format('F')}}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-primary d-inline">Filter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div id="accordion">
            @if($incomes->isEmpty())
                <h1>No data found for you requested year. ({{request()->input('year')}})</h1>
            @endif
            @foreach($incomes as $month)
                <div class="card">
                    <div class="card-header d-flex justify-content-between text-lg" data-toggle="collapse"
                         data-target="#month-{{$month->month}}">
                        <div>Month: {{$month->month}}</div>
                        <div>Number of orders: {{$month->number_of_orders}}</div>
                        <div>Total Income: {{$month->total}}</div>
                    </div>
                    <table class="table table-striped table-sm ml-3 card-body" id="month-{{$month->month}}"
                           data-parent="#accordion">
                        <tr>
                            <th>Day</th>
                            <th>Number of Order</th>
                            <th>Total Income</th>
                        </tr>
                        @foreach($month as $day)
                            <tr>
                                <td>{{$day->day}}</td>
                                <td>{{$day->number_of_orders}}</td>
                                <td>{{$day->total}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            @endforeach

            {{--            @include('admin.income.table')--}}

        </div>
    </div>

@endsection
