@php
    $services = \App\Models\Service::all()->pluck('name', 'id');
@endphp

    <!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
</div>
<!-- Service Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('service_id', 'Service Id:') !!}
    {!! Form::select('service_id', $services, null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Total Piece Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_piece', 'Total Piece') !!}
    {!! Form::number('total_piece', null, ['class' => 'form-control']) !!}
</div>

<!-- Regular Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('regular_price', 'Regular Price:') !!}
    {!! Form::number('regular_price', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::number('price', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Save Field -->
<div class="form-group col-sm-6">
    {!! Form::label('save', 'Save:') !!}
    {!! Form::number('save', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Duration Field -->
<div class="form-group col-sm-6">
    {!! Form::label('duration', 'Duration') !!}
    {!! Form::number('duration', null, ['class' => 'form-control']) !!}
</div>
