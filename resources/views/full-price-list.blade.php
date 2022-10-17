@extends('layouts.app')
@php
    $services = \App\Models\Service::with('laundry_type')->get();
@endphp
@section('content')
    <div class="m-4">
        <div id="price" class="grid sm:grid-cols-2 gap-3 justify-between">
            @foreach($services as $service)
                <div class="border-b border-gray-200 shadow px-3 bg-white">
                    <table class="divide-y divide-gray-300 w-full">
                        <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-2 text-s text-gray-500">
                                Product Name
                            </th>
                            <th class="px-6 py-2 text-s text-gray-500">
                                {{$service->name}} Price
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-300">
                        @foreach($service->laundry_type as $product)
                            <tr class="whitespace-nowrap">
                                <td class="px-6 py-4 text-center">
                                    {{$product->name}}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    {{$product->price($service)}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endforeach
        </div>
    </div>
@endsection
