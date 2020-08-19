<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Dotenv\Result\Success;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;

class LoginController extends Controller
{
    /**
     * Get Admin Login View
     * @return view  login view
     */
    public function getlogin()
    {
        return view('admin.auth.login');
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
            return redirect()->route('admin.dashboard');
        }
       // dd(redirect()->back()->with(['error'=>'there is an error in data'])->withInput($request->all()));
        //notify()->error('خطأ في البيانات برجاء المحاولة مجددا');
        return redirect()->route('admin.login')->with(['error'=>'هناك خطأ في البيانات'])->withInput($request->all());
    }
}
