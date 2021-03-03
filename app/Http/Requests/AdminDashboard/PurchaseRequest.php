<?php

namespace App\Http\Requests\AdminDashboard;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    } // end of autorize

    
    public function rules()
    {
        return [
            'supplies'=>'required|array',
        ];
    } //end of rules

    public function message()
    {
        return [
          
        ];
    } // end of messages
       
}//end of purchase request
