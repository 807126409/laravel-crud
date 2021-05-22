<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use DB;
use Hash;

class AuthenticationController extends Controller
{
	 /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    /**
     * Display the authentication Form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showAuthenticationForm()
	{
	    // show the form
	    return view('auth.authentication');
	}

/*    public function login(\Illuminate\Http\Request $request) {
	    $this->validateLogin($request);
    	

	    // If the class is using the ThrottlesLogins trait, we can automatically throttle
	    // the login attempts for this application. We'll key this by the username and
	    // the IP address of the client making these requests into this application.
	    if ($this->hasTooManyLoginAttempts($request)) {
	        $this->fireLockoutEvent($request);
	        return $this->sendLockoutResponse($request);
	    }

	    

	    // If the login attempt was unsuccessful we will increment the number of attempts
	    // to login and redirect the user back to the login form. Of course, when this
	    // user surpasses their maximum number of attempts they will get locked out.
	    $this->incrementLoginAttempts($request);

	    return $this->sendFailedLoginResponse($request);
	}*/
    public function authenticate(Request $request)
    {
        
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('task');
        }

        return redirect('login')->with('error', 'Oppes! You have entered invalid credentials');
    }

    public function storeUser(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('task');
    }

}
