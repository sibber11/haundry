<table class="table table-striped table-inverse">
    <thead class="thead-inverse">
        <tr>
            <th>Laundry Name</th>
            <th>Service Type (Price)</th>
            <th>Amount</th>
            <th>Sub Total</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($order->laundries as $laundry)
            <tr>
                <td scope="row">{{ $laundry->laundry_type->name }}</td>
                <td>{{ $laundry->service_type .' ('. $laundry->laundry_type->{$laundry->service_type.'_price'}.')' }}</td>
                <td>{{ $laundry->amount }}</td>
                <td>{{ $laundry->laundry_type->{$laundry->service_type.'_price'} * $laundry->amount }}</td>
            </tr>
            @endforeach
        </tbody>
</table>

