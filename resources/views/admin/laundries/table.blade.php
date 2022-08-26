<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="laundries-table">
            <thead>
            <tr>
                {{-- <th>Order Id</th> --}}
                <th>Laundry Type Id</th>
                <th>Service Type (Price)</th>
                <th>Amount</th>
                <th>Sub Total</th>
                {{-- <th colspan="3">Action</th> --}}
            </tr>
            </thead>
            <tbody>
            @foreach($laundries as $laundry)
                <tr>
                    {{-- <td>{{ $laundry->order_id }}</td> --}}
                    <td>{{ $laundry->laundry_type->name }}</td>
                    <td>{{ $laundry->service->name.' ('. $laundry->price .')' }}</td>
                    <td>{{ $laundry->amount }}</td>
                    <td>{{ $laundry->laundry_type->{$laundry->service->name.'_price'} * $laundry->amount }}</td>
                    {{-- <td  style="width: 120px">
                        {!! Form::open(['route' => ['admin.laundries.destroy', $laundry->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('admin.laundries.show', [$laundry->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.laundries.edit', [$laundry->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td> --}}
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{-- <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $laundries])
        </div>
    </div> --}}
</div>
