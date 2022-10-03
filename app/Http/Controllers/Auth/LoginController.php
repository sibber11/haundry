<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Notifications\TwoFactorCode;
use App\Providers\RouteServiceProvider;
use App\Rules\PhoneValidator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
//    protected $redirectTo = RouteServiceProvider::HOME;
//    protected $redirectTo = '/home';

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
     * @param \Illuminate\Http\Request $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        if (request()->routeIs('admin.attempt')) {
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendLoginResponse(Request $request)
    {
        $guard_name = null;
//        dd(request()->route()->getName());
        if (request()->routeIs('admin.attempt')) {
            $guard_name = 'admin';
        }
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);
        if ($response = $this->authenticated($request, $this->guard($guard_name)->user())) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect()->intended($this->redirectPath());
    }

    public function redirectTo()
    {
        if (request()->routeIs('admin.attempt'))
            return RouteServiceProvider::HOME;
        else
            return route('profile');
    }
}
