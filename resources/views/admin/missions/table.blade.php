<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="missions-table">
            <thead>
            <tr>
                <th>User Id</th>
                <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($missions as $mission)
                <tr>
                    <td>{{ $mission->user_id }}</td>
                    <td>{{ $mission->status }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['admin.missions.destroy', $mission->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('admin.missions.show', [$mission->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.missions.edit', [$mission->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $missions])
        </div>
    </div>
</div>
