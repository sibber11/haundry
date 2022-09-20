@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        @lang('models/orders.singular') @lang('crud.detail')
                    </h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-default float-right" href="{{ route('admin.orders.index') }}">
                        @lang('crud.back')
                    </a>
                    @if($order->status == 'placed')

                        <form action="{{route('admin.orders.update_status')}}" method="post"
                              class="d-inline float-right mr-2" id="status">
                            @csrf
                            <input type="hidden" name="order_id[]" value="{{$order->id}}">
                            <button class="btn btn-default" name="status" value="confirmed">Confirm Order</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </section>
    @error('status')
    {{$message}}
    @enderror
    <div class="content px-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('admin.orders.show_fields')
                </div>
                <div class="row">
                    @include('admin.laundries.table', ['laundries' => $order->laundries])
                </div>
            </div>
        </div>
    </div>
@endsection
