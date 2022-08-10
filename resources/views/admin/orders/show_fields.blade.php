<!-- Customer Id Field -->
<div class="col-sm-12">
    {!! Form::label('customer_name', 'Customer Name:') !!}
    <p>{{ $order->customer->name }}</p>
</div>

<!-- Total Field -->
<div class="col-sm-12">
    {!! Form::label('total', 'Total:') !!}
    <p>{{ $order->total }}</p>
</div>

<!-- Deadline Field -->
<div class="col-sm-12">
    {!! Form::label('deadline', 'Deadline:') !!}
    <p>{{ $order->deadline }}</p>
</div>

