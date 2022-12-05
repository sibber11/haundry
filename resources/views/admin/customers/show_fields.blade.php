<!-- Name Field -->
<div class="col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $customer->name }}</p>
</div>

<!-- Email Field -->
<div class="col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $customer->email }}</p>
</div>

<!-- Phone Field -->
<div class="col-sm-6">
    {!! Form::label('phone', 'Phone:') !!}
    <p>{{ $customer->phone }}</p>
</div>

<!-- Email Verified At Field -->
<div class="col-sm-6">
    {!! Form::label('email_verified_at', 'Email Verified At:') !!}
    <p @class(['text-red' => !$customer->email_verified_at])>{{ $customer->email_verified_at ?? 'unverified'}}</p>
</div>

<!-- Phone Verified At Field -->
<div class="col-sm-6">
    {!! Form::label('phone_verified_at', 'Phone Verified At:') !!}
    <p @class(['text-red' => !$customer->phone_verified_at])>{{ $customer->phone_verified_at ?? 'unverified' }}</p>
</div>

<div class="col-sm-6">
    {!! Form::label('address', 'Address:') !!}
    <p>{{ $customer->address }}</p>
</div>

<div class="col-sm-6">
    {!! Form::label('point', 'Point:') !!}
    <p>{{ $customer->point->total }}</p>
</div>

<div class="col-sm-6">
    {!! Form::label('orders', 'Total Orders:') !!}
    <p>{{ $customer->orders()->count() }}</p>
</div>
