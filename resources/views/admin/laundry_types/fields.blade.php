<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
</div>
@php
    $categories = App\Models\Category::all()->pluck('name', 'id');
@endphp
<!-- Category Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category_id', 'Category:') !!}
    {!! Form::select('category_id',$categories, null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Wash Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('wash_price', 'Wash Price:') !!}
    {!! Form::number('wash_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Dry Wash Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dry_wash_price', 'Dry Wash Price:') !!}
    {!! Form::number('dry_wash_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Iron Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('iron_price', 'Iron Price:') !!}
    {!! Form::number('iron_price', null, ['class' => 'form-control']) !!}
</div>
