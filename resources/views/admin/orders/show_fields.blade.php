<!-- Customer Name Field -->
<div class="col-sm-6">
    {!! Form::label('order_id', 'Order ID:') !!}
    <p>{{ $order->id }}</p>
</div>

<div class="col-sm-6">
    {!! Form::label('customer_name', 'Customer Name:') !!}
    <p>{{ $order->customer->name }}</p>
</div>

<div class="col-sm-6">
    {!! Form::label('order_status', 'Order Status:') !!}
    <p>{{ ucfirst($order->status) }}</p>
</div>

<!-- Total Field -->
<div class="col-sm-6">
    {!! Form::label('total', 'Total:') !!}
    <p>{{ $order->total }}</p>
</div>

<!-- Deadline Field -->
<div class="col-sm-6">
    {!! Form::label('deadline', 'Deadline:') !!}
    <p>{{ $order->deadline }}</p>
</div>

