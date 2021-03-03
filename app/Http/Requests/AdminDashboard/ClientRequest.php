<?php

namespace App\Http\Requests\AdminDashboard;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    } // end of autorize

    
    public function rules()
    {
        return [
            'name' =>'required',
            'phone' =>'required|array|min:1',
            'phone.0' =>'required',
            'address' =>'required',
        ];
    } //end of rules

    public function message()
    {
        return [
          
        ];
    } // end of messages
}//end of client request
