<?php

namespace App\Models ;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Translatable;

    public $translatedAttributes = ['name','description'];
    protected $fillable = [
       'category_id', 'perchase_price', 'sale_price', 'stock',
    ];
    protected $appends = ['profit_percentage' ];



    ############## relationships ###################
    
    // one to many --> a category has many products
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    // one to many --> a product has many images
    public function productimage()
    {
        return $this->hasMany(Productimage::class);
    }
    
    // many to many --> orders has many products , products belongs to may orders
    public function order()
    {
        return $this->belongsToMany(Order::class);
    }
    
    ############## Getting Attributes ###################

    public function getProfitPercentageAttribute()
    {
        $profit = $this->sale_price - $this->perchase_price ;
        $profit_percentage = $profit * 100 / $this->perchase_price ;
        return number_format( $profit_percentage,2);
    }

   

  
}
