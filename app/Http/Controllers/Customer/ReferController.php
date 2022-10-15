<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Mail\InvitationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReferController extends Controller
{
    public function send_refer(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);
        Mail::to($request->input('email'))->send(new InvitationMail());
        return redirect()->route('referview')->with('status', 'Invitation Sent!');
    }

    public function view_refer()
    {
        return view('customer.refer');
    }
}
