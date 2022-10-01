@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Incomes for year 2022</h1>
                </div>
                <div class="col-sm-6">
                    {{--                    <form>--}}
                    {{--                        <div class="input-group mb-3">--}}
                    {{--                            <div class="input-group-prepend">--}}
                    {{--                                <span class="input-group-text">month</span>--}}
                    {{--                            </div>--}}
                    {{--                            <select name="month" id="" class="form-control d-inline">--}}
                    {{--                                <option selected value="2022">2022</option>--}}
                    {{--                            </select>--}}
                    {{--                            <select id='month-select' class="form-control d-inline" name="month">--}}
                    {{--                                <option value=''>--Select Month--</option>--}}
                    {{--                                <option value='1'>January</option>--}}
                    {{--                                <option value='2'>February</option>--}}
                    {{--                                <option value='3'>March</option>--}}
                    {{--                                <option value='4'>April</option>--}}
                    {{--                                <option value='5'>May</option>--}}
                    {{--                                <option value='6'>June</option>--}}
                    {{--                                <option value='7'>July</option>--}}
                    {{--                                <option value='8'>August</option>--}}
                    {{--                                <option value='9'>September</option>--}}
                    {{--                                <option value='10'>October</option>--}}
                    {{--                                <option value='11'>November</option>--}}
                    {{--                                <option value='12'>December</option>--}}
                    {{--                            </select>--}}
                    {{--                            <div class="input-group-append">--}}
                    {{--                                <button class="btn btn-default d-inline">Filter</button>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </form>--}}
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
