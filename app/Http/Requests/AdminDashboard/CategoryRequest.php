<?php

namespace App\Http\Requests\AdminDashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use phpDocumentor\Reflection\Types\This;

class CategoryRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }// end of authorize()

    protected function prepareForValidation() :void
    {
        $this->merge( remove_translatable_nulls($this));
    }//end prepare for vlaidation()

    public function rules()
    {
        return [
            'wrap_id'=>'required',
            default_language().'.name' => 'required',
            '*.name' =>  Rule::unique('category_translations','name')->ignore($this->category->id ?? '','category_id'),
        ];
    } //end of rules

    public function message()
    {
        return [

        ];
    } // end of messages
} //end of category request
