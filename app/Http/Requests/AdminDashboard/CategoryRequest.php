<?php

namespace App\Http\Requests\AdminDashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
        $rules = ['wrap_id'=>'required'];
        // dd( Rule::unique('category_translations','name')->ignore($this->category->id ?? 0));
        // dd( Rule::unique('category_translations','name')->ignore($this->category->id,'category_id'));
        foreach(config('translatable.locales') as $locale){
            $rules += [$locale.'.name' => ['required', Rule::unique('category_translations','name')->ignore($this->category->id ?? '','category_id')] ]; 
        }
        return $rules;
    } //end of rules

    public function message()
    {
        return [
          
        ];
    } // end of messages
} //end of category request
