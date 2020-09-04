<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Category extends Model
{
    use Translatable;

    public $translatedAttributes = ['name'];
    // protected $guarded = [];

    protected $appends = ['products_total' ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getProductsTotalAttribute()
    {
       $products_total = 0 ;
       $categories = Category::all();
       foreach($categories as $category){
            $products_total += $category->products->count();
       }
        return $products_total;
    }

}
