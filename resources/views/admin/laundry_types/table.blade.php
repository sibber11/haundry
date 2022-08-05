<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="laundry-types-table">
            <thead>
            <tr>
                <th>Category</th>
                <th>Name</th>
                <th>Wash Price</th>
                <th>Dry Wash Price</th>
                <th>Iron Price</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($laundryTypes as $laundryType)
                <tr>
                    <td>{{ $laundryType->category }}</td>
                    <td>{{ $laundryType->name }}</td>
                    <td>{{ $laundryType->wash_price }}</td>
                    <td>{{ $laundryType->dry_wash_price }}</td>
                    <td>{{ $laundryType->iron_price }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['admin.laundryTypes.destroy', $laundryType->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('admin.laundryTypes.show', [$laundryType->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.laundryTypes.edit', [$laundryType->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $laundryTypes])
        </div>
    </div>
</div>
