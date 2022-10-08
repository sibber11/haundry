@extends('layouts.customer')

@section('content')
    <div class="m-2">
        @if(session('status'))
            ola
        @endif
        @php
            /** @var \App\Models\Customer $customer */
                $customer = auth('customer')->user();
        @endphp
        <form method="POST" action="{{route('customer.update_profile')}}"
              class="flex flex-col gap-2"
        >
            @method('patch')
            @csrf
            <div class="w-full flex flex-col mt-2">
                <label for="name" class="font-semibold leading-none">Name:</label>
                <input
                    class="leading-none text-gray-50 p-3 focus:outline-none focus:border-blue-700 mt-4 border-0 bg-gray-800 rounded"
                    required="" name="name" type="text" value="{{$customer->name}}"
                    id="name">
            </div>
            <div class="w-full flex flex-col mt-2">
                <label for="email" class="font-semibold leading-none">Email:</label>
                <input
                    class="leading-none text-gray-50 p-3 focus:outline-none focus:border-blue-700 mt-4 border-0 bg-gray-800 rounded"
                    name="email" type="email" value="{{$customer->email}}"
                    id="email">
            </div>

            <div class="w-full flex flex-col mt-2">
                <label for="phone" class="font-semibold leading-none">Phone:</label>
                <input
                    class="leading-none text-gray-50 p-3 focus:outline-none focus:border-blue-700 mt-4 border-0 bg-gray-800 rounded"
                    required="" name="phone" type="text" value="{{$customer->phone}}"
                    id="phone">
            </div>

            <div class="w-full flex flex-col mt-2">
                <label for="address" class="font-semibold leading-none">Address:</label>
                <input
                    class="leading-none text-gray-50 p-3 focus:outline-none focus:border-blue-700 mt-4 border-0 bg-gray-800 rounded"
                    required="" placeholder="add shop location here as example"
                    name="address" type="text" value="{{$customer->address}}" id="address">
            </div>

            <div class="w-full flex flex-col mt-2">
                <label for="password" class="font-semibold leading-none">Current Password:</label>
                <input
                    class="leading-none text-gray-50 p-3 focus:outline-none focus:border-blue-700 mt-4 border-0 bg-gray-800 rounded"
                    name="current_password" type="password" id="password">
            </div>

            <div class="w-full flex flex-col mt-2">
                <label for="new_password" class="font-semibold leading-none">New Password:</label>
                <input
                    class="leading-none text-gray-50 p-3 focus:outline-none focus:border-blue-700 mt-4 border-0 bg-gray-800 rounded"
                    name="password" type="password" id="new_password">
            </div>
            <div class="w-full flex flex-col mt-2">
                <label for="password_confirmation" class="font-semibold leading-none">Retype Password:</label>
                <input
                    class="leading-none text-gray-50 p-3 focus:outline-none focus:border-blue-700 mt-4 border-0 bg-gray-800 rounded"
                    name="password_confirmation" type="password" value="" autocomplete="false"
                    id="password_confirmation">
            </div>

            <div class="w-full flex mt-2 flex-row gap-3">
                <button class="bg-macaw-900 text-white p-2 rounded px-4">Save</button>
                <a href="{{url('/')}}"
                   class="bg-red-600 text-white rounded p-2 px-4 text-center"> Cancel </a>
            </div>

        </form>
    </div>
@endsection
