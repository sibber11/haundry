<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $laundryType->name }}</p>
</div>

<!-- Category Field -->
<div class="col-sm-12">
    {!! Form::label('category', 'Category:') !!}
    <p>{{ $laundryType->category->name}}</p>
</div>

<!-- Wash Price Field -->
<div class="col-sm-12">
    {!! Form::label('wash_price', 'Wash Price:') !!}
    <p>{{ $laundryType->wash_price }}</p>
</div>

<!-- Dry Wash Price Field -->
<div class="col-sm-12">
    {!! Form::label('dry_wash_price', 'Dry Wash Price:') !!}
    <p>{{ $laundryType->dry_wash_price }}</p>
</div>

<!-- Iron Price Field -->
<div class="col-sm-12">
    {!! Form::label('iron_price', 'Iron Price:') !!}
    <p>{{ $laundryType->iron_price }}</p>
</div>

