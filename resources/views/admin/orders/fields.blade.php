@php
    $categories = \App\Models\Category::with('laundry_types')->get();
    $customers = \App\Models\Customer::all()->keyBy('id');
@endphp
<admin-order-fields  :model="{{ $order ?? '[]' }}" :categories="{{ $categories ?? '[]' }}"
                    :initial-cart="{{$cart ?? "[]"}}" :customers="{{$customers ?? '[]'}}"
>
    @csrf
</admin-order-fields>
