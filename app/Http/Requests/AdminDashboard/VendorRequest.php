<?php

namespace App\Http\Requests\AdminDashboard;

use Illuminate\Foundation\Http\FormRequest;

class VendorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }//end of authorize

    
    public function rules()
    {
        
        return [
            'name' => 'required',
            'address' => 'required',
            'about' => 'required',
            'phone' => 'required | min:10 | max:13',
            'logo' => 'image',
            'admin_id'=>'required',
        ];
    } //end of rules

    public function message()
    {
        return [
          
        ];
    } // end of messages
}//end of vendor request
