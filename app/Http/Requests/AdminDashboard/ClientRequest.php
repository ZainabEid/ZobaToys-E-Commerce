<?php

namespace App\Http\Requests\AdminDashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClientRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    } // end of autorize

    
    public function rules()
    {
        return [
            'surname' => "sometimes|in:0,1",
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' =>['required' , 'digits_between:10,13', Rule::unique('clients')->ignore($this->client)],
            'address' =>['nullable','sometimes','string', 'max:255'],
        ];
    } //end of rules

    public function message()
    {
        return [
          
        ];
    } // end of messages
}//end of client request
