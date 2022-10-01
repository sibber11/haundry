<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequestCallRequest;
use App\Models\RequestCall;

class RequestCallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function request(StoreRequestCallRequest $request)
    {
        $input = $request->validated();
        RequestCall::create($input);
        return redirect('/')->with('status', 'Expect a call from us in few minutes');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\RequestCall $requestCall
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestCall $requestCall)
    {
        //
    }

    public function markdone(RequestCall $call)
    {
        $call->mark_as_called();
//        return response('marked_done', 200);
        return redirect()->route('admin.home');
    }
}
