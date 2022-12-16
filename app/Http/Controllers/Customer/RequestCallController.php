<?php

namespace App\Http\Controllers\Customer;

use App\Events\CallRequested;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequestCallRequest;
use App\Models\RequestCall;
use Laracasts\Flash\Flash;

class RequestCallController extends Controller
{
    public function request(StoreRequestCallRequest $request)
    {
        $input = $request->validated();
        $request_call = RequestCall::create($input);
        CallRequested::dispatch($request_call);
        $request->session()->put($input);
        Flash::success('Expect a call from us in few minutes');
        return redirect('/');
    }
}
