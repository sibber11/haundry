<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="packages-table">
            <thead>
            <tr>
                <th>Service name</th>
                <th>Name</th>
                <th>Total Piece</th>
                <th>Regular Price</th>
                <th>Price</th>
                <th>Save</th>
                <th>Duration</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($packages as $package)
                <tr>
                    <td>{{ $package->service->name }}</td>
                    <td>{{ $package->name }}</td>
                    <td>{{ $package->total_piece }}</td>
                    <td>{{ $package->regular_price }}</td>
                    <td>{{ $package->price }}</td>
                    <td>{{ $package->save }}</td>
                    <td>{{ $package->duration }}</td>
                    <td style="width: 120px">
                        {!! Form::open(['route' => ['admin.packages.destroy', $package->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('admin.packages.show', [$package->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.packages.edit', [$package->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $packages])
        </div>
    </div>
</div>
