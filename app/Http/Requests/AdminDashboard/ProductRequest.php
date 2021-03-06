<?php

namespace App\Http\Requests\AdminDashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }//end of authorize

    protected function prepareForValidation() :void
    {
       // array_filter(): removes null valued items, array_values(): resets index

        $this->merge([
            'category_ids' => array_values(array_filter($this['category_ids'])),
        ]);
    }//end prepare for vlaidation()

    
    public function rules()
    {
        //   [nun localized fields]
        $rules = [
            'category_ids' => 'required|array|min:1',
            'images' => 'array|min:1',
            'images.*' => 'image',
            'perchase_price' => 'required',
            'price' => 'required',
            'in_sale' => 'required|in:0,1',
            'sale' => 'nullable|min:10|max:90',
            'stock' => 'required',
        ];

        //   [localized fields]
        foreach (config('translatable.locales') as $locale) {
            $rules += [$locale.'.name' => ['required', Rule::unique('product_translations', 'name')->ignore($this->product->id ?? '','product_id')]];
            //$rules += [$locale.'.description' => 'required'];
        }

        return $rules;
    }//end of rules

    public function message()
    {
        return [
          
        ];
    } // end of messages

}//end of product request
