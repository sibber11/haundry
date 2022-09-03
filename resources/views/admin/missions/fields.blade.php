@php
$users = \App\Models\User::all()->pluck('name', 'id');
@endphp

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Name:') !!}
    {!! Form::select('user_id',$users, null, ['class' => 'form-control', 'required']) !!}
</div>

{{--<!-- Status Field -->--}}
{{--<div class="form-group col-sm-6">--}}
{{--    {!! Form::label('status', 'Status:') !!}--}}
{{--    {!! Form::text('status', null, ['class' => 'form-control', 'required']) !!}--}}
{{--</div>--}}
