<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if (Auth::attempt($this->credentials($request))) {
            // check whether user has permission
            $user = Auth::user();
            if($user->is_active)
            {
//                if($user->permissions()->count() >0 ||$user->is_super_admin)
                if($user->roles->count() > 0 || $user->is_super_admin)
                {
                    return $this->sendLoginResponse($request);
                }
                else
                {
                    $this->guard()->logout();
                    return redirect()->back()->with("error", "No Role assigned to your account!  Please Contact Administrator.");
                }

            }
            else
            {
                $this->guard()->logout();
                return redirect()->back()->with("error", "Your account is in-active!  Please Contact Administrator.");
            }
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    protected function credentials(Request $request)
    {
        if (is_numeric($request->get('email'))) {
            return ['telephone' => $request->get('email'), 'password' => $request->get('password')];
        }
        return ['email' => $request->get('email'), 'password' => $request->get('password')];
    }
}
