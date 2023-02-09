@extends('layouts.customer')

@php
    $user = auth('customer')->user();
@endphp

@section('content')
    <div class="m-4">
        @include('sections.packages')
    </div>
@endsection

