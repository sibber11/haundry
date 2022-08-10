<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Phone:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Email Verified At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email_verified_at', 'Email Verified At:') !!}
    {!! Form::text('email_verified_at', null, ['class' => 'form-control','id'=>'email_verified_at']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#email_verified_at').datepicker()
    </script>
@endpush

<!-- Phone Verified At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone_verified_at', 'Phone Verified At:') !!}
    {!! Form::text('phone_verified_at', null, ['class' => 'form-control','id'=>'phone_verified_at']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#phone_verified_at').datepicker()
    </script>
@endpush

<!-- password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control', 'required']) !!}
</div>
<!-- password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password_confirm', 'Retype Password:') !!}
    {!! Form::password('password_confirm', ['class' => 'form-control', 'required']) !!}
</div>
