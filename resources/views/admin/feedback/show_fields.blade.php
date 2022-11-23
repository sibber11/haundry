<!-- Feedback Field -->
<div class="col-sm-6">
    {!! Form::label('id', 'ID:') !!}
    <p>{{ $feedback->id }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $feedback->name }}</p>
</div>

<!-- Feedback Field -->
<div class="col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $feedback->email }}</p>
</div>

<!-- Feedback Field -->
<div class="col-sm-6">
    {!! Form::label('feedback', 'Feedback:') !!}
    <p>{{ $feedback->feedback }}</p>
</div>
