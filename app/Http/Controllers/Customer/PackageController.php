<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PackageController extends Controller
{
    public function show(Package $package)
    {
        return view('customer.buy_package', ['package' => $package]);
    }

    public function buy(Package $package, Request $request)
    {
        /** @var Customer $user */
        $user = Auth::user();
        $user->purchase($package);
        \Flash::success('Purchase Successful');
        return redirect()->back();
    }
}
