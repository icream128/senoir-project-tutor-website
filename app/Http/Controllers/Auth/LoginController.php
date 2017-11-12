<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Lang;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use DB;

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
    // protected $redirectTo = '/firstpage';

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
    
    public function login(Request $req) {
        $username = $req->input('username');
        $password = $req->input('password');

        $check = DB::table('user')
        ->select(['status_user_id'])
        ->where('username', $username)
        ->first();
        
        if($check->status_user_id == 1) {
            if(\Illuminate\Support\Facades\Auth::attempt(['username'=>$username,'password'=>$password], $req->remember)){
                return $this->redirectTo();
            }else{

                return redirect()->back()
                ->withInput($req->only($this->username(), 'remember'))
                ->withErrors([
                    'password' => Lang::get('auth.password'),
                ]);
            }
        } else {
            echo '<script>alert("คุณถูกระงับการใช้งาน");window.location = "/login"</script>';
        }

    }

    public function redirectTo() {

            $userRoleId =Auth::user()->role_id;
            if($userRoleId == 1){
                return redirect('learnermycourse');
            }
            if($userRoleId == 2){
                return redirect('tutorhome');
            }
            if($userRoleId == 3){
                return redirect('viewuser');
            }
    }
}
