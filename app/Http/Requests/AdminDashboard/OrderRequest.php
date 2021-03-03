<?php

namespace App\Http\Requests\AdminDashboard;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    } // end of autorize

    
    public function rules()
    {
        return [
            'products'=>'required|array',
            'paid_trigger'=>'in:0,1',
            'ship_trigger'=>'in:0,1',
        ];
    } //end of rules

    public function message()
    {
        return [
          
        ];
    } // end of messages
}//end of order request
