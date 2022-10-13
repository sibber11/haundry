<!-- Discount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('discount', 'Discount:') !!}
    {!! Form::number('discount', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Minimum Field -->
<div class="form-group col-sm-6">
    {!! Form::label('minimum', 'Minimum:') !!}
    {!! Form::number('minimum', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Customer Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customer_id', 'Customer Id:') !!}
    {!! Form::number('customer_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Used Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('is_used', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('is_used', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('is_used', 'Is Used', ['class' => 'form-check-label']) !!}
    </div>
</div>
