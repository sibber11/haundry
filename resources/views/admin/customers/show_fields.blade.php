<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $customer->name }}</p>
</div>

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $customer->email }}</p>
</div>

<!-- Phone Field -->
<div class="col-sm-12">
    {!! Form::label('phone', 'Phone:') !!}
    <p>{{ $customer->phone }}</p>
</div>

<!-- Email Verified At Field -->
<div class="col-sm-12">
    {!! Form::label('email_verified_at', 'Email Verified At:') !!}
    <p>{{ $customer->email_verified_at }}</p>
</div>

<!-- Phone Verified At Field -->
<div class="col-sm-12">
    {!! Form::label('phone_verified_at', 'Phone Verified At:') !!}
    <p>{{ $customer->phone_verified_at }}</p>
</div>

<!-- Password Field -->
<div class="col-sm-12">
    {!! Form::label('password', 'Password:') !!}
    <p>{{ $customer->password }}</p>
</div>

<!-- Remember Token Field -->
<div class="col-sm-12">
    {!! Form::label('remember_token', 'Remember Token:') !!}
    <p>{{ $customer->remember_token }}</p>
</div>

<!-- Two Factor Field -->
<div class="col-sm-12">
    {!! Form::label('two_factor', 'Two Factor:') !!}
    <p>{{ $customer->two_factor }}</p>
</div>

<!-- Two Factor Via Field -->
<div class="col-sm-12">
    {!! Form::label('two_factor_via', 'Two Factor Via:') !!}
    <p>{{ $customer->two_factor_via }}</p>
</div>

<!-- Two Factor Code Field -->
<div class="col-sm-12">
    {!! Form::label('two_factor_code', 'Two Factor Code:') !!}
    <p>{{ $customer->two_factor_code }}</p>
</div>

<!-- Two Factor Expires At Field -->
<div class="col-sm-12">
    {!! Form::label('two_factor_expires_at', 'Two Factor Expires At:') !!}
    <p>{{ $customer->two_factor_expires_at }}</p>
</div>

