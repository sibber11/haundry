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
            <!-- Name Field -->
            <div class="form-item">
                <label for="name">Name:</label>
                <input class="" required="" name="name" type="text" value="{{$customer->name}}"
                       id="name">
            </div>

            <!-- Email Field -->
            <div class="form-item">
                <label for="email">Email:</label>
                <input class="" name="email" type="email" value="{{$customer->email}}"
                       id="email">
            </div>

            <!-- Phone Field -->
            <div class="form-item">
                <label for="phone">Phone:</label>
                <input class="" required="" name="phone" type="text" value="{{$customer->phone}}"
                       id="phone">
            </div>

            <!-- Phone Field -->
            <div class="form-item">
                <label for="address">Address:</label>
                <input class="" required="" placeholder="add shop location here as example"
                       name="address" type="text" value="{{$customer->address}}" id="address">
            </div>

            <div class="form-item">
                <label for="password">Current Password:</label>
                <input class="" name="current_password" type="password" id="password">
            </div>

            <div class="form-item">
                <label for="new_password">New Password:</label>
                <input class="" name="password" type="password" id="new_password">
            </div>
            <div class="form-item">
                <label for="password_confirmation">Retype Password:</label>
                <input class="" name="password_confirmation" type="password" value="" autocomplete="false"
                       id="password_confirmation">
            </div>

            <div class="form-item sm:block sm:mt-3">
                <button class="bg-macaw-900 text-white p-2 rounded px-4">Save</button>
                <a href="http://localhost/admin/customers"
                   class="bg-red-600 text-white rounded p-2 px-4 text-center"> Cancel </a>
            </div>

        </form>
    </div>
@endsection
