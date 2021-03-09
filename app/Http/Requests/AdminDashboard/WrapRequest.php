<?php

namespace App\Http\Requests\AdminDashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class WrapRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }//end of authorize

    protected function prepareForValidation() :void
    {
        $this->merge( remove_translatable_nulls($this));
    }//end prepare for vlaidation()

    public function rules()
    {
        return [
            default_language().'.name' => 'required',
            default_language().'.description' => 'required',
            '*.name' =>  Rule::unique('wrap_translations','name')->ignore($this->wrap->id ?? '','wrap_id'),
            '*.description' =>  Rule::unique('wrap_translations','description')->ignore($this->wrap->id ?? '','wrap_id'),
    ]; 
    } //end of rules

    public function message()
    {
        return [
            
        ];
    } // end of messages
}// end of wrap request
