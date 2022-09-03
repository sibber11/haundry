<!-- User Id Field -->
<div class="col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $mission->user_id }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $mission->status }}</p>
</div>
