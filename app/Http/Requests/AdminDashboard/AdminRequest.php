<?php

namespace App\Http\Requests\AdminDashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'email' => [
                'required',
                Rule::unique('admins')->ignore($this->admin),
            ],
            'phone' => ['required' , 'min:10' , 'max:13'],
            'photo' => ['image'],
            'password' => ['sometimes','required' ,  'min:6' ,  'confirmed'],
            'role' => ['sometimes','required'],
        ];
    } //end of rules

    public function message()
    {
        return [
          
        ];
    } // end of messages
  
}// end of admin request
