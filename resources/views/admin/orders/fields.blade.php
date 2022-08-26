@php
    $types = App\Models\LaundryType::all()->keyBy('id');
    $customers = \App\Models\Customer::all()->keyBy('id');
@endphp
<admin-order-fields  :model="{{ $order ?? '[]' }}" :types="{{ $types ?? '[]' }}"
                    :initial-cart="{{$cart ?? "[]"}}" :customers="{{$customers ?? '[]'}}"
>
    @csrf
</admin-order-fields>
