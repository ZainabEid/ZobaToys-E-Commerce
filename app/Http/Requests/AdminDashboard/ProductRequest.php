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

    
    public function rules()
    {
        ########## start validation rules ##########
        //   [nun localized fields]
        $rules = [
            'category_ids' => 'required|array|min:1',
            'images' => 'array|min:1',
            'images.*' => 'image',
            'perchase_price' => 'required',
            'price' => 'required',
            'in_sale' => 'in:0,1',
            'sale' => '',
            'stock' => 'required',
        ];

        //   [localized fields]
        foreach (config('translatable.locales') as $locale) {
            $rules += [$locale.'.name' => ['required', Rule::unique('product_translations', 'name')]];
            //$rules += [$locale.'.description' => 'required'];
        }
        ########## end validation rules ##########
        return $rules;
    }//end of rules

    public function message()
    {
        return [
          
        ];
    } // end of messages

}//end of product request
