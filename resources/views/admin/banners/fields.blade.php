<div class="form-group col-sm-12">
    {!! Form::label('caption', 'Caption:') !!}
    {!! Form::text('caption',null, ['class' => 'form-control']) !!}
</div>
<!-- Image Field -->
<div class="form-group col-sm-12">
    {!! Form::label('image', 'Image:') !!}
    {!! Form::file('image', ['class' => 'form-control-file', 'required']) !!}
</div>


<!-- Show Field -->
<div class="form-group col-sm-12">
    <div class="form-check">
        {!! Form::hidden('show', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('show', '1', true, ['class' => 'form-check-input']) !!}
        {!! Form::label('show', 'Show', ['class' => 'form-check-label']) !!}
    </div>
</div>
