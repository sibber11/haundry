@php
    $categories = \App\Models\Category::all();
    $services = \App\Models\Service::all();
@endphp
<laundry-type-fields :categories="{{$categories ?? '[]'}}" :services="{{$services ?? '[]'}}" :model="{{$laundryType ?? '[]'}}">
    @csrf
</laundry-type-fields>
