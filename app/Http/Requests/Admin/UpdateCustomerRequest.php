<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        $id = auth('customer')->user()->id;
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'address' => 'required|string',
            'password' => 'confirmed'
        ];

        return $rules;
    }
}
