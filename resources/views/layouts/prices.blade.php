@php
    $prices = \App\Models\LaundryType::limit(12)->get();
    $chunked_price = $prices->chunk(6);
//    dump($prices);
@endphp
<div class="service-name">
    <h2>Prices</h2>
</div>
<div id="price" class="grid sm:grid-cols-2 gap-3 justify-between">
    @foreach($chunked_price as $products)
        <div class="border-b border-gray-200 shadow px-3 bg-white">
            <table class="divide-y divide-gray-300 w-full">
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-2 text-s text-gray-500">
                        Product Name
                    </th>
                    <th class="px-6 py-2 text-s text-gray-500">
                        Service Price
                    </th>
                    {{--                    <th class="px-6 py-2 text-s text-gray-500">--}}
                    {{--                        Wash Price--}}
                    {{--                    </th>--}}
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-300">
                @foreach($products as $product)
                    <tr class="whitespace-nowrap">
                        <td class="px-6 py-4 text-center">
                            {{$product->name}}
                        </td>
                        <td class="px-6 py-4 text-center">
                            @foreach($product->services as $service)
                                <div class="text-sm">
                                    <strong>
                                        {{$service->name}}:
                                    </strong>
                                    <span>
                                        {{$service->pivot->price}}
                                    </span>
                                </div>
                            @endforeach
                        </td>
                        {{--                        <td class="px-6 py-4 text-center">--}}
                        {{--                            25--}}
                        {{--                        </td>--}}
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endforeach
</div>
<div class="text-center my-4">
    <a href="{{route('price-list')}}" class="bg-macaw-900 p-2 rounded text-white">Show More</a>
</div>
