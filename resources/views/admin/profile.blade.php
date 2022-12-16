@extends('admin.layouts.app')
@php
    $user = auth()->user();
@endphp
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>
                        Edit Profile
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($user,['route' => 'admin.update_profile', 'method' => 'patch']) !!}
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-sm-12">
                        {!! Form::label('name', 'Name:') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
                    </div>

                    <!-- Email Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('email', 'Email:') !!}
                        {!! Form::email('email', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Phone Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('phone', 'Phone:') !!}
                        {!! Form::text('phone', null, ['class' => 'form-control', 'required']) !!}
                    </div>

                    <!-- password Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('current_password', 'Current Password:') !!}
                        {!! Form::password('current_password', ['class' => 'form-control']) !!}
                    </div>
                    <!-- password Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('password', 'New Password:') !!}
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                    </div>
                    <!-- password Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('password_confirmation', 'Retype Password:') !!}
                        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('admin.home') }}" class="btn btn-default ml-2">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>

@endsection
