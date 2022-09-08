@php
    $categories = \App\Http\Resources\CategoryResource::collection(\App\Models\Category::with('laundry_types')->get());
@endphp
<admin-order-fields :model="{{ $order ?? '[]' }}" :categories="{{ $categories->toJson() ?? '[]' }}"
                    :initial-cart="{{$cart ?? "[]"}}">
    @csrf
</admin-order-fields>
