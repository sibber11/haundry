<?php

namespace App\Http\Controllers\Auth;

use Debugbar;
use Illuminate\Http\Request;
use App\Rules\PhoneValidator;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Notifications\TwoFactorCode;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:customer')->except('logout');
        $this->middleware('guest:admin')->except('logout');
    }

    public function username(): string
    {
        return 'email_or_phone';
    }

    protected function credentials(Request $request)
    {
        $username = $request->input($this->username());
        $data = ['password' => $request->input('password')];
        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $data['email'] = $username;
        } elseif (PhoneValidator::validate($username)) {
            $data['phone'] = $username;
        }
        return $data;
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->two_factor) {
            $user->generateTwoFactorCode();
            $user->notify(new TwoFactorCode());
        }
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        if (request()->routeIs('admin.')) {
            return Auth::guard('admin')->attempt(
                $this->credentials($request),
                $request->boolean('remember')
            );
        } else {
            return Auth::guard('customer')->attempt(
                $this->credentials($request),
                $request->boolean('remember')
            );
        }
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard($guard_name = null)
    {
        return Auth::guard($guard_name);
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendLoginResponse(Request $request)
    {
        $guard_name = null;
        if (request()->routeIs('admin.')) {
            $guard_name = 'admin';
        }
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect()->intended($this->redirectPath());
    }
}
