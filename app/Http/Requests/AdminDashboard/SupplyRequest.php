<?php

namespace App\Http\Requests\AdminDashboard;

use Illuminate\Foundation\Http\FormRequest;

class SupplyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    } // end of autorize

    
    public function rules()
    {
        return [
            'supplier_id'=>'required',
            'group_id'=>'required',
            'name'=>'required',
            'color'=>'required',
            'purchase_price'=>'required',
            'image'=>'image',
            'stock'=>'required',
            'stock_unit'=>'required',
        ];
    } //end of rules

    public function message()
    {
        return [
          
        ];
    } // end of messages
}//end of supply request
