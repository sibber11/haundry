<!-- Service Id Field -->
<div class="col-sm-6">
    {!! Form::label('service_id', 'Service Name:') !!}
    <p>{{ $package->service->name }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $package->name }}</p>
</div>

<!-- Total Piece Field -->
<div class="col-sm-6">
    {!! Form::label('total_piece', 'Total Piece:') !!}
    <p>{{ $package->total_piece }}</p>
</div>

<!-- Regular Price Field -->
<div class="col-sm-6">
    {!! Form::label('regular_price', 'Regular Price:') !!}
    <p>{{ $package->regular_price }}</p>
</div>

<!-- Price Field -->
<div class="col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    <p>{{ $package->price }}</p>
</div>

<!-- Save Field -->
<div class="col-sm-6">
    {!! Form::label('save', 'Save:') !!}
    <p>{{ $package->save }}</p>
</div>

<!-- Duration Field -->
<div class="col-sm-6">
    {!! Form::label('duration', 'Duration:') !!}
    <p>{{ $package->duration }}</p>
</div>

<!-- Subscriber Field -->
<div class="col-sm-6">
    {!! Form::label('subscriber', 'Subscriber:') !!}
    <p>{{ $package->subscriber ?? 'No Subscriber yet' }}</p>
</div>

