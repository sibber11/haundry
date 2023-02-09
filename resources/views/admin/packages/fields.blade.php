<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Points Field -->
<div class="form-group col-sm-6">
    {!! Form::label('points', 'Points:') !!}
    {!! Form::number('points', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::number('price', null, ['class' => 'form-control', 'required']) !!}
</div>
