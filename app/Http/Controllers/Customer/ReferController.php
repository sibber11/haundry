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
            'mail' => 'required|email'
        ]);
        Mail::to($request->input('mail'))->send(new InvitationMail());
        return redirect('/')->with('status', 'Invitation Sent!');
    }
}
