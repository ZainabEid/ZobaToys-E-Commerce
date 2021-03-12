<?php

namespace App\Http\Controllers\Shop\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
  
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::SHOP;

    public function showRegistrationForm()
    {
        return view('shop.users.auth.register');
    }

    
    public function __construct()
    {
        $this->middleware('guest');
    }// end of construc

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'surname' => "sometimes|in:0,1",
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' =>['required' , 'digits_between:10,13','unique:clients'],
            'address' =>['nullable','sometimes','string', 'max:255'],

            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }//end of validator

    
    protected function create(array $data)
    {
        return Client::create([
            'surname' => $data['surname'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone' => (int)$data['phone'],
            'address' => $data['address'],
        ])->user()->create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }//end of create

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
        $this->guard()->login($user);
        dd('user logged in');

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return redirect()->route('shop.login')->with(['error'=>'هناك خطأ في البيانات'])->withInput($request->all());
    }

    
    
}//end of reqister class
