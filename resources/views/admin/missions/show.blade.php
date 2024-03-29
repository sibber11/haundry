@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        @lang('models/missions.singular') @lang('crud.detail')
                    </h1>
                </div>
                <div class="col-sm-6">

                    <a class="btn btn-default float-right ml-2"
                       href="{{ route('admin.missions.index') }}">
                        @lang('crud.back')
                    </a>
                    @if(auth()->user()->mission?->status == 'pending')
                        <a class="btn btn-default float-right"
                           href="{{ route('admin.missions.start') }}">
                            Start
                        </a>
                    @elseif(auth()->user()->mission?->status == 'running')
                        <a class="btn btn-default float-right"
                           href="{{ route('admin.missions.end') }}">
                            End
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        @include('flash::message')
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('admin.missions.show_fields')
                </div>
                <div class="row">
                    @include('admin.orders.table', ['orders' => $mission->orders()->paginate()])
                </div>
            </div>
        </div>
    </div>
@endsection
