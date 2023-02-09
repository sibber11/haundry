<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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

//    protected $redirectTo = RouteServiceProvider::HOME;
//    protected $redirectTo = '/home';
    private $adminRoute;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:customer')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->adminRoute = request()->is('admin*');
    }

    public function username(): string
    {
        return 'email_or_phone';
    }

    public function showLoginForm()
    {
        if ($this->adminRoute)
            return view('auth.login');
        else
            return view('customer.auth.login');
    }

    protected function credentials(Request $request)
    {
        $username = $request->input($this->username());
        $data = ['password' => $request->input('password')];
        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $data['email'] = $username;
        } elseif (PhoneValidator::validate(null, $username)) {
            $data['phone'] = $username;
        }
        return $data;
    }

    protected function attemptLogin(Request $request)
    {
        $guard = $this->adminRoute ? 'admin' : 'customer';
        return Auth::guard($guard)->attempt(
            $this->credentials($request),
            $request->boolean('remember')
        );
    }

    protected function guard($guard_name = null)
    {
        return Auth::guard($guard_name);
    }

    protected function sendLoginResponse(Request $request)
    {
        $guard_name = null;
        if ($this->adminRoute) {
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
        if ($this->adminRoute)
            return RouteServiceProvider::ADMIN_HOME;
        else
            return RouteServiceProvider::CUSTOMER_HOME;
    }
}
