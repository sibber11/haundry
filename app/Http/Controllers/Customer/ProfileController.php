<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateCustomerRequest;
use App\Models\Customer;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('customer.profile');
    }

    public function update_profile(UpdateCustomerRequest $request)
    {
        /** @var Customer $customer */
        $customer = auth('customer')->user();
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->address = $request->input('address');
        $customer->phone = $request->input('phone');
        if ($request->input('password') != null)
            $customer->password = \Hash::make($request->input('password'));
        $customer->save();
        return redirect()->route('profile')->with('status', 'saved');
    }

    public function voucher()
    {
        return view('customer.voucher');
    }

    public function claim_voucher(Request $request)
    {
        /** @var Customer $customer */
        $customer = auth('customer')->user();
        $voucher = $customer->generateVoucher($request->input('amount') / 10);
        if (is_string($voucher)) {
            Flash::error($voucher);
            return redirect()->route('voucher')->with('status', $voucher);
        } else
            return redirect()->route('voucher')->with('status', 'Voucher added to your profile.');

    }

    public function check_voucher(Request $request)
    {
        /** @var Customer $customer */
        $customer = auth('customer')->user();
        $request->validate([
            'voucher_code' => 'required|string'
        ]);
        /** @var Voucher $voucher */
        $voucher = Voucher::whereCode($request->input('voucher_code'))->first();
        if (empty($voucher))
            return 'bad code';
        if ($voucher->is_useable_by($customer))
            return $voucher;
        else
            return 'bad code';

    }
}

