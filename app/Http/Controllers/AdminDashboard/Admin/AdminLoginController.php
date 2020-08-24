<?php

namespace App\Http\Controllers\AdminDashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Dotenv\Result\Success;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }
    
    /**
     * Get Admin Login View
     * @return view  login view
     */
    public function showLoginForm()
    {
        return view('adminDashboard.admin.auth.admin-login');
    }

    /**
     * check if Login request is auth 
     * @param LoginRequest 
     * @return redirect dashboard view // if succeded
     * @return redirect back() with errors // if faild
     */
    public function login(LoginRequest $request)
    {
        $remember_me = $request->has('remember_me') ? true : false;
        if( auth()->guard('admin')->attempt([ 'email' => $request->input('email') , 'password' => $request->input('password') ])){
           // notify()-Success('تم الدخول بنجاح');
            return redirect()->route('adminDashboard.index');
        }
       // dd(redirect()->back()->with(['error'=>'there is an error in data'])->withInput($request->all()));
        //notify()->error('خطأ في البيانات برجاء المحاولة مجددا');
        return redirect()->route('adminDashboard.login')->with(['error'=>'هناك خطأ في البيانات'])->withInput($request->all());
    }
    public function logout(Request $request)
    {
        auth()->guard('admin')->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ? : redirect(route('adminDashboard.login'));
    }
}
