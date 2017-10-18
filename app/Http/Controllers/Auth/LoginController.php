<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use DB;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Lang;
>>>>>>> 0a6d2a7c3e5967de5dbe37712bb912fe2be31244

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
    protected $redirectTo = '/firstpage';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

<<<<<<< HEAD
=======

>>>>>>> 0a6d2a7c3e5967de5dbe37712bb912fe2be31244
    public function username()
    {
        return 'username';
    }
<<<<<<< HEAD
    
    public function login(Request $req) {
        $username = $req->input('username');
        $password = $req->input('password');

        if(Auth::attempt(['username'=>$username,'password'=>$password], $req->remember)){
            return redirect('firstpage');
        }else{
            echo "fail";
        }
=======

    public function login(Request $req) {

        $username = $req->input('username');
        $password = $req->input('password');

        if(\Illuminate\Support\Facades\Auth::attempt(['username'=>$username,'password'=>$password], $req->remember)){

            return redirect('firstpage');

        }
        if (! \Illuminate\Support\Facades\Auth::attempt(['username'=>$username,'password'=>$password],$req->remember)){

            return redirect()->back()
                ->withInput($req->only($this->username(), 'remember'))
                ->withErrors([
                    'password' => Lang::get('auth.password'),
                ]);
        }

>>>>>>> 0a6d2a7c3e5967de5dbe37712bb912fe2be31244
    }
}
