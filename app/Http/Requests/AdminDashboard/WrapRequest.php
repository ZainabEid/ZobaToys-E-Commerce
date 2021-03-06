<?php

namespace App\Http\Requests\AdminDashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class WrapRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [];

        foreach(config('translatable.locales') as $locale){
            $rules += [
                $locale.'.name' => ['required', Rule::unique('wrap_translations','name')->ignore($this->wrap->id ?? '','wrap_id')],
                $locale.'.description' => ['required', Rule::unique('wrap_translations','description')->ignore($this->wrap->id ?? '','wrap_id')]
        ]; 
        }
        return $rules;
    } //end of rules

    public function message()
    {
        return [
          
        ];
    } // end of messages
}// end of wrap request
