<div class="col-sm-6">
    {!! Form::label('order_id', 'Order ID:') !!}
    <p>{{ $order->id }}</p>
</div>

<div class="col-sm-6">
    {!! Form::label('customer_name', 'Customer Name:') !!}
    <p>{{ $order->customer->name }} (ID:{{$order->customer_id}})</p>
</div>

<div class="col-sm-6">
    {!! Form::label('order_status', 'Order Status:') !!}
    <p>{{ ucfirst($order->status) }}</p>
</div>

<!-- Total Field -->
<div class="col-sm-6">
    {!! Form::label('total', 'Total:') !!}
    <span class="badge {{$order->paid?'badge-success':'badge-danger'}}">{{$order->paid?'paid':'due'}}</span>
    <p>{{ $order->total }}</p>
</div>

<!-- Total Field -->
<div class="col-sm-6">
    {!! Form::label('sub_total', 'Sub Total:') !!}
    <p>{{ $order->sub_total }}</p>
</div>

<!-- Deadline Field -->
<div class="col-sm-6">
    {!! Form::label('deadline', 'Deadline:') !!}
    <p>{{ $order->deadline }}</p>
</div>

@if($order->status == 'delivered' && !$order->paid)
    <div class="col-sm-6">
        {!! Form::label('due_date', 'Due Date:') !!}
        <p>{{ $order->due_date }}</p>
    </div>
@endif

