@php
    $categories = \App\Models\Category::with('laundry_types')->get();
@endphp
<section class="py-20 bg-white sm:px-8">
    <div class="container max-w-6xl mx-auto">
        <p class="font-medium text-blue-500 uppercase px-2 text-center" id="pricing">
            See our pricing
        </p>
        <h2 class="text-3xl font-extrabold leading-none text-secondary md:text-5xl px-2 text-center">
            Cheapest Laundry and Dry Cleaning Services in Town
        </h2>
        @foreach($categories as $category)
            @if($category->laundry_types->count() == 0)
                @continue
            @endif
            <h3 class="text-2xl text-gray-600 md:pr-16 text-center py-8 border-b-2 border-gray-300 underline">
                {{$category->name}} Category
            </h3>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">Product Name</th>
                        @foreach(\App\Models\Service::all() as $service)
                            <th scope="col" class="px-6 py-3">{{$service->name}} Price</th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($category->laundry_types as $laundry_type)
                        <tr class="border-b odd:bg-white even:bg-gray-50">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{$laundry_type->name}}</td>
                            @foreach(\App\Models\Service::all() as $service)
                                <td class="px-6 py-4">
                                    @if($laundry_type->services->contains($service))
                                        {{$laundry_type->services->find($service->id)->pivot->price}}
                                    @else
                                        N/A
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach
    </div>
</section>
