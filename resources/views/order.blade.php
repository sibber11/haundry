@extends('layouts.app')
@php
$laundry_types = App\Models\LaundryType::all();
@endphp
@section('content')
    <div class="container">
        <div class="row">
            <div id="cart">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Amount</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <form action="{{route('order.store')}}" method="post" id="cart_form">
                @csrf
                <select name="laundry_type" id="">
                    @foreach ($laundry_types as $laundry)
                    <span>
                        <option value="{{$laundry->id}}">{{ Str::ucfirst($laundry->name)}}</option>
                    </span>
                    @endforeach
                </select>
                <input type="number" name="amount" id="">
                <button type="button" onclick="">Add to cart</button>
            </form>
        </div>
    </div>
@endsection
