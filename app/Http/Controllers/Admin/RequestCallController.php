<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RequestCall;
use Laracasts\Flash\Flash;

class RequestCallController extends Controller
{
    public function destroy(RequestCall $call)
    {
        $call->delete();
        Flash::success('Requested item deleted!');
        return redirect()->route('admin.home');
    }

    public function markdone(RequestCall $call)
    {
        $call->mark_as_called();
        Flash::success('Requested item removed from queue');
        return redirect()->route('admin.home');
    }
}
