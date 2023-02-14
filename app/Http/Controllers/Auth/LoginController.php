<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Cookie;

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

    public function username()
    {
        return 'username';
    }

    public function login() {
        return view('login');
    }

    public function logout() {
        Auth::logout();
        $cookie = Cookie::forget('wing-carts');
        return redirect()->route('login')
            ->withCookie($cookie);
    }

    public function postLogin(Request $request) {
        $request->validate([
            'username'=> 'required',
            'password' => 'required'
        ]);

        $user = User::where(['username' => $request->username])->first();
        if ($user) {
            if(password_verify($request->password, $user->password)) {
                auth()->login($user);
                return redirect()->route('products.index');
            } else {
                return redirect()->back()->with(['error' => 'Invalid username or password']);
            } 
        } else {
            return redirect()->back()->with(['error' => 'User not registered']);
        }
    }
}