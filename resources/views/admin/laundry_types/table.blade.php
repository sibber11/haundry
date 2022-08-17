<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="laundry-types-table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Service Price</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($laundryTypes as $laundryType)
                <tr>
                    <td>{{ $laundryType->name }}</td>
                    <td>{{ $laundryType->category->name }}</td>
                    <td>
                        @foreach ($laundryType->services as $service)
                            <span class="text-capitalize">{{$service->name}}</span> : {{$service->pivot->price}},
                        @endforeach
                    </td>
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
