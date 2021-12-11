<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Session;
use Alert;
use Auth;

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
    protected $redirectTo = 'login';

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

        $input = $request->all();
   
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {

            if (auth()->user()->is_admin == 'admin') {

                $name = Auth::user()->name;

                return redirect()->route('dashboard')->with('success', 'Hi ;), Selamat Datang Kembali '.$name);
                
            }else {

                $name = Auth::user()->name;
                return redirect()->route('dashboard')->with('success', 'Hi ;), Selamat Datang Kembali '.$name);
            }

        }else{
            return redirect()->route('login')->with('warning', 'Email Dan Password Anda Salah...!');
        }
    }
}
