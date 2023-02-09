<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="vouchers-table">
            <thead>
            <tr>
                <th>Code</th>
                <th>Discount</th>
                <th>Minimum</th>
                <th>Customer Id</th>
                <th>Is Used</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($vouchers as $voucher)
                <tr>
                    <td>{{ $voucher->code }}</td>
                    <td>{{ $voucher->discount }}</td>
                    <td>{{ $voucher->minimum }}</td>
                    <td>{{ $voucher->customer_id }}</td>
                    <td>{{ $voucher->is_used? 'used': 'unused' }}</td>
                    <td style="width: 120px">
                        {!! Form::open(['route' => ['admin.vouchers.destroy', $voucher->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            {{--                            <a href="{{ route('admin.vouchers.show', [$voucher->id]) }}"--}}
                            {{--                               class='btn btn-default btn-xs'>--}}
                            {{--                                <i class="far fa-eye"></i>--}}
                            {{--                            </a>--}}
                            <a href="{{ route('admin.vouchers.edit', [$voucher->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $vouchers])
        </div>
    </div>
</div>
