@extends('layouts.customer')
@section('content')
    <h1 class="text-xl font-bold m-3">Update Address</h1>
    <form action="{{route('address.update', ['redirect' => 'review_order'])}}" method="post"
          class="mx-3 mt-5 text-lg px-3 py-3 bg-gray-100 rounded">
        @csrf
        <div class="mb-8">
            <label for="address" class="block">Address: </label>
            <textarea name="address" id="address" class="py-1 px-2 rounded shadow w-full mt-3 focus:outline-none"
                      rows="3">{{$address}}</textarea>
        </div>
        <div class="w-full flex mt-2 flex-row gap-3">
            <button class="bg-macaw-900 text-white py-1 rounded px-3">Save</button>
            <a href="{{request()->has('redirect')?route('review_order'):route('profile')}}"
               class="bg-red-600 text-white rounded py-1 px-3 text-center"> Cancel </a>
        </div>
    </form>
@endsection
