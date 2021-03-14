<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
   
    use AuthenticatesUsers;

   
    protected $redirectTo = RouteServiceProvider::SHOP ;

   
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }//end of construct

    public function showLoginForm()
    {
        return view('shop.users.auth.login');
    }//end of show login form

    public function login(LoginRequest $request)
    {
        $remember_me = $request->has('remember_me') ? true : false;
        if( auth()->guard('web')->attempt([ 'email' => $request->input('email') , 'password' => $request->input('password') ])){
           // notify()-Success('تم الدخول بنجاح');
            return redirect()->route('shop');
        }
       // dd(redirect()->back()->with(['error'=>'there is an error in data'])->withInput($request->all()));
        //notify()->error('خطأ في البيانات برجاء المحاولة مجددا');
        return redirect()->route('login')->with(['error'=>'هناك خطأ في البيانات'])->withInput($request->all());
    }//end of login 

    public function logout(Request $request)
    {
        auth()->guard('web')->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ? : redirect()->route('shop');
    }//end of logout

}//end of login controller
