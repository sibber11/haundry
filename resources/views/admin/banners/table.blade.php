<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="banners-table">
            <thead>
            <tr>
                <th>Image</th>
                <th>Caption</th>
                <th>Visibility</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($banners as $banner)
                <tr>
                    <td>
                        <img src="{{ Storage::url($banner->image) }}" alt="image"
                             style="max-width: 100%; max-height: 200px;">
                    </td>
                    <td>{{$banner->caption}}</td>
                    <td>
                        <div>{{ $banner->show?'Visible':'Hidden' }}</div>
                        <div>
                            {!! Form::open(['route' => ['admin.banners.update', $banner->id], 'method' => 'patch']) !!}
                            {!! Form::hidden($banner->show?'hide':'show', true) !!}
                            {!! Form::button('Toggle Visibility', ['type' => 'submit', 'class' => 'btn btn-warning btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                            {!! Form::close() !!}
                        </div>
                    </td>
                    <td style="width: 120px">
                        {!! Form::open(['route' => ['admin.banners.destroy', $banner->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
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
            @include('adminlte-templates::common.paginate', ['records' => $banners])
        </div>
    </div>
</div>
