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
            'in_sale' => $this['in_sale'] ?  $this['in_sale'] : 0,
            'sale' => $this['sale'] ?  $this['sale'] : 10,
            remove_translatable_nulls($this),
        ]);
    }//end prepare for vlaidation()

    
    public function rules()
    {
        return  [
            'category_ids' => 'required|array|min:1',
            'images' => 'array|min:1',
            'images.*' => 'image',
            'perchase_price' => 'required',
            'price' => 'required',
            'in_sale' => 'required|in:0,1',
            'sale' => 'integer',
            'stock' => 'required',
            default_language().'.name' =>  'required',
            default_language().'.description' =>  'required',
            '*.name' =>  Rule::unique('product_translations', 'name')->ignore($this->product->id ?? '','product_id'),
            '*.description' =>  Rule::unique('product_translations', 'description')->ignore($this->product->id ?? '','product_id'),
        ];
    }//end of rules

    public function message()
    {
        return [
          
        ];
    } // end of messages

}//end of product request
