<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="orders-table">
            <thead>
            <tr>
                @if(request()->routeIs('admin.orders.index') && Request::has('filter'))
                    <th>
                        <input type="checkbox" onclick="$('.order-selector').prop('checked', this.checked)">
                    </th>
                @endif
                <th>Order Id</th>
                <th>Customer Name</th>
                <th>Order Status</th>
                @if(Request::routeIs('admin.orders.index'))
                    <th>Deadline</th>
                @elseif(Request::routeIs('admin.missions.show'))
                    <th>Address</th>
                @endif
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    @if(request()->routeIs('admin.orders.index') && Request::has('filter'))
                        <th>
                            <input type="checkbox" name="order_id[]" form="assign-form" value="{{$order->id}}"
                                   class="order-selector">
                        </th>
                    @endif
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->customer->name }}</td>
                    <td>{{ $order->status }}</td>
                    @if(Request::routeIs('admin.orders.index'))
                        <td>{{$order->deadline}}</td>
                    @elseif(Request::routeIs('admin.missions.show'))
                        <td>{{$order->customer->address}}</td>
                    @endif
                    @if(Request::routeIs('admin.missions.show'))
                        <td>
                            <form action="{{route('admin.missions.complete_one')}}" method="post">
                                @csrf
                                @method('patch')
                                <button class="btn btn-primary" name="order_id"
                                        value="{{$order->id}}" {{$order->status == 'ondelivery' || $order->status == 'onpickup'?'':'disabled'}}>
                                    @if($order->status == 'ondelivery')
                                        Deliver
                                    @elseif($order->status == 'delivered')
                                        Delivered
                                    @elseif($order->status == 'onpickup')
                                        Pickup
                                    @else
                                        Picked up
                                    @endif
                                </button>
                            </form>
                        </td>
                    @else
                        <td style="width: 120px">
                            {!! Form::open(['route' => ['admin.orders.destroy', $order->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ route('admin.orders.show', [$order->id]) }}"
                                   class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.orders.edit', [$order->id]) }}"
                                   class='btn btn-default btn-xs'>
                                    <i class="far fa-edit"></i>
                                </a>
                                {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $orders])
        </div>
    </div>
</div>
