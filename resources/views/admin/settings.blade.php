@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Edit about</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="content px-3">
        @include('flash::message')
    </div>
    @php
        $settings = \App\Models\Settings::first();
    @endphp
    <div class="content px-3">
        @include('adminlte-templates::common.errors')
        <div class="card">
            {!! Form::open(['route' => 'admin.settings.update', 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-sm-12">
                        {!! Form::label('about_top', 'About Top:') !!}
                        {!! Form::text('about_top', $settings->about_top, ['class' => 'form-control', 'required']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        {!! Form::label('about_bot', 'About bot:') !!}
                        {!! Form::textarea('about_bot', $settings->about_bot, ['class' => 'form-control', 'required']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        {!! Form::label('logo', 'Logo:') !!}
                        <div>
                            <img src="{{asset($settings->logo)}}" alt="logo"
                                 style="max-width: 100%; max-height: 200px;">
                        </div>
                        {!! Form::file('logo', ['class' => 'form-control-file', 'required']) !!}
                    </div>
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('admin.missions.index') }}" class="btn btn-default"> Cancel </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
