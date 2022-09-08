<?php

namespace App\Http\Middleware;

use App\Models\Customer;
use Closure;
use Illuminate\Http\Request;

class CheckReferral
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->hasCookie('referral')) {
            return $next($request);
        }
        if (($refer = $request->input('ref')) && Customer::referralExists($refer)) {
            return redirect(($request->fullUrl()))->withCookies([cookie()->forever('referral', $refer)]);
        }
        return $next($request);
    }
}
