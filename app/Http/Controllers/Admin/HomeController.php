<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateAdminProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Kutia\Larafirebase\Facades\Larafirebase;
use Laracasts\Flash\Flash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('twofactor');
        $this->middleware('verified');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home');
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function update_profile(UpdateAdminProfileRequest $request)
    {
        /** @var User $user */
        $user = Auth::user();
        $user->fill($request->validated());
        $user->save();
        if ($request->input('current_password') != null) {
            if (Hash::check($request->input('current_password'), $user->password)) {
                $user->password = Hash::make($request->input('password'));
                Flash::success('Password changed successfully');
            } else {
                Flash::error('Wrong Password');
            }
        }

        Flash::success('Profile updated successfully.');
        return redirect()->route('admin.profile');
    }

    public function updateToken(Request $request)
    {
        try {
            $request->user()->update(['fcm_token' => $request->token]);
            return response()->json([
                'success' => true
            ]);
        } catch (\Exception $e) {
            report($e);
            return response()->json([
                'success' => false
            ], 500);
        }
    }

    public function notification(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'message' => 'required'
        ]);

        try {
            $fcmTokens = User::whereNotNull('fcm_token')->pluck('fcm_token')->toArray();

            //Notification::send(null, new PushNotification($request->title, $request->message, $fcmTokens));

            /* or */

            //auth()->user()->notify(new PushNotification($request->title, $request->message, $fcmTokens));

            /* or */

            Larafirebase::withTitle($request->title)
                ->withBody($request->message)
                ->sendMessage($fcmTokens);
            Flash::success('Notification sent successfully.');
            return 'success';

        } catch (\Exception $e) {
            report($e);
            Flash::error('Something went wrong. Please try again later.');
            return 'error';
        }
    }
}
