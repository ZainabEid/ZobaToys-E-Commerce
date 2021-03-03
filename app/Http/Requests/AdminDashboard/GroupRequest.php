<?php

namespace App\Http\Requests\AdminDashboard;

use Illuminate\Foundation\Http\FormRequest;

class GroupRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    } // end of autorize

    
    public function rules()
    {
        return [
            'name' => 'required',
            'description' => 'required',
        ];
    } //end of rules

    public function message()
    {
        return [
          
        ];
    } // end of messages
}//end of group request
