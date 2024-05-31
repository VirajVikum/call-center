<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    

    protected function authenticated(Request $request, $user)
    {
        $user->status=1;
        $user->save();

        if ($user->user_type_id == '1') {
            return redirect('/home');
        } else {
            return redirect('/agent');
        }
    }

    public function logout(Request $request)
    {
        $user=Auth::user();

        if($user){
            $user->status=0;
            $user->save();
        }

        Auth::logout();

        $request->session()->invalidate();        
        $request->session()->regenerateToken();
        
        return redirect('/');
    }

}
