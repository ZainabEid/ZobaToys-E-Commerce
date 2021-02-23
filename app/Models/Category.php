<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Category extends Model
{
    use Translatable;
    
    protected $fillable = ['wrap_id'];

    public $translatedAttributes = ['name'];
    // protected $guarded = [];

    protected $appends = ['products_total' ];


    ############### relations ################
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    public function wrap()
    {
        return $this->belongsTo(Wrap::class);
    }


    ################ get attributes #################

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
