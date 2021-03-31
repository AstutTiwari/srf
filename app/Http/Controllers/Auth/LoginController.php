<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Session;
use Validate;

use App\Models\User;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\ThrottlesLogins;
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
    use  ThrottlesLogins;


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
        $this->validateLogin($request);
        $user = User::where('email','=',$request->email)->first();
        if(!$user)
        {
            Session::flash("message", "Authentication Failed! User does not exist.");
            Session::flash('type', 'error');
            return redirect()->route('login');
        }
        $credentials = $request->only($this->username(), 'password');
        if(Auth::validate($credentials))
        {
            if(Auth::attempt($credentials, $request->has('remember')))
            {
                return $this->afterLoginRedirect($user);
            }
        }
        else 
        {
            $msg = "Authentication Failed!.";    
            Session::flash("message", $msg);
            Session::flash('type', 'error');
            return redirect()->route('login');
        }
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required', 'password' => 'required',
        ]);
    }

    public function afterLoginRedirect($user)
    {
        if($user->hasRole('Admin')) 
            return redirect(route('admin.dashboard'));
        return redirect(route('home.index'));           
    }
    public function authentication()
    {
       return view('auth.authentication');
    }
    #protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
}
