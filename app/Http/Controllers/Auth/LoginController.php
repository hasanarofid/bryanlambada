<?php

namespace App\Http\Controllers\Auth;

// use App\Http\Controllers\Controller;
// use App\Providers\RouteServiceProvider;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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
    protected $redirectTo = '/';
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
         * Create a new controller instance.
         *
         * @return void
         */
        public function login(Request $request)
        {

            $input = $request->all();

            $this->validate($request, [
                'myusername' => 'required',
                'mypassword' => 'required',
            ]);
            // print_r(auth()->attempt(array('myusername' => $input['username'], 'password' => $input['password'])));die();


            $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'myusername';
            if(auth()->attempt(array($fieldType => $input['username'], 'password' => SHA1($input['password']) )))
            {
              // print_r('ok');die();
                return redirect()->route('home');
            }else{
              // print_r('ok2');die();
                return redirect()->route('login')
                    ->with('error','Email-Address And Password Are Wrong.');
            }

        }
}
