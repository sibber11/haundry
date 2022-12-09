<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="laundry-types-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Feedback</th>
                <th>Visibility</th>
                <th colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($feedbacks as $feedback)
                <tr>
                    <td>{{$feedback->id}}</td>
                    <td>{{ $feedback->name }}</td>
                    <td>{{ $feedback->email }}</td>
                    <td>{{ $feedback->feedback }}</td>
                    <td>
                        <div>{{ $feedback->show?'Visible':'Hidden' }}</div>
                        {!! Form::open(['route' => ['admin.feedbacks.update', $feedback->id], 'method' => 'patch']) !!}
                        {!! Form::hidden('toggle') !!}
                        {!! Form::button('Toggle Visibility', ['type' => 'submit', 'class' => 'btn btn-warning btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        {!! Form::close() !!}
                    </td>
                    <td style="width: 120px">
                        {!! Form::open(['route' => ['admin.feedbacks.destroy', $feedback->id], 'method' => 'delete']) !!}
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $feedbacks])
        </div>
    </div>
</div>
