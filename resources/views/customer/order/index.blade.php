@extends('layouts.customer')

@php
$orders = Auth::user()->orders;
@endphp
@section('content')
    <div class="container my-4">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Orders</h3>
                </div>

                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th style="width: 10px">#ID</th>
                            <th>Total</th>
                            <th>Date</th>
                            <th style="width: 40px">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{$order->total}}</td>
                                <td>{{$order->created_at}}</td>
                                <td><span class="badge bg-danger">{{$order->status}}</span></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
    </div>
@endsection
