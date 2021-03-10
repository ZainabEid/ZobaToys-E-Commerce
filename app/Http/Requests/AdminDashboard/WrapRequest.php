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
        $rule = [];
        foreach(config('translatable.locales') as $locale){
            if($locale != default_language()){

                $rule += [ 
                    $locale.".name" => "required_with:'.$locale.'.description",
                    $locale.".description" => "required_with:'.$locale.'.name", 
                ];
            }
        }

        return [
            default_language().'.name' => 'required',
            default_language().'.description' => 'required',
            $rule,
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
