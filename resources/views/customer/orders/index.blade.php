@extends('layouts.customer')

@php
    $orders = Auth::user()->orders()->orderBy('created_at')->paginate(10);
@endphp
@section('content')
    <div class="">
        <h3 class="font-bold text-lg p-2 mb-4">Orders</h3>
        <table class="divide-y divide-gray-300 w-full text-sm sm:text-base">
            <thead class="bg-gray-50">
            <tr>
                <th class="sm:px-6 py-2 text-s text-gray-500">
                    #ID
                </th>
                <th class="sm:px-6 py-2 text-s text-gray-500">
                    Total
                </th>
                <th class="sm:px-6 py-2 text-s text-gray-500">
                    Date
                </th>
                <th class="sm:px-6 py-2 text-s text-gray-500">
                    Status
                </th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-300">
            @foreach($orders as $order)
                <tr>
                    <td class="sm:px-6 py-4 text-center">{{$order->id}}</td>
                    <td class="sm:px-6 py-4 text-center">{{$order->total}}</td>
                    <td class="sm:px-6 py-4 text-center">{{$order->created_at}}</td>
                    <td class="sm:px-6 py-4 text-center">
                            <span>
                                {{$order->status}}
                            </span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="my-2">
            {{$orders->links()}}
        </div>
    </div>
@endsection
