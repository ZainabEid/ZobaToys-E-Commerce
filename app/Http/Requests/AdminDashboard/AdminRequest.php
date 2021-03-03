<?php

namespace App\Http\Requests\AdminDashboard;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    } // end of autorize

    
    public function rules()
    {
        return [
            'name' => ['required'],
            'email' => ['required' , 'email' , 'unique:admins'],
            'phone' => ['required' , 'min:10' , 'max:13'],
            'photo' => ['image'],
            'password' => ['required' ,  'min:6' ,  'confirmed'],
            'permissions' => ['required' ,  'min:1'],
        ];
    } //end of rules

    public function message()
    {
        return [
          
        ];
    } // end of messages
  
}// end of admin request
