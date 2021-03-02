<?php

namespace App\Models ;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use Translatable;

    public $translatedAttributes = ['name','description'];
    protected $fillable = [
       'perchase_price','price','in_sale' ,'sale' ,  'stock', 'vendor_id' ,'avg_star'
    ];
    protected $appends = ['profit_percentage', 'sale_price' ];



    ############## relationships ###################
    
    // one to many --> a category has many products
    public function category()
    {
        return $this->belongsToMany(Category::class);
    }
    
    // one to many --> a product has many images
    public function productimages()
    {
        return $this->hasMany(Productimage::class);
    }
    
    // many to many --> orders has many products , products belongs to may orders
    public function order()
    {
        return $this->belongsToMany(Order::class);
    }// end of order

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    } //end  of vendor

    
   

 
    
    ############## Getting Attributes ###################

    public function getProfitPercentageAttribute()
    {
        $profit = $this->sale_price - $this->perchase_price ;
        $profit_percentage = $profit * 100 / $this->perchase_price ;
        return number_format( $profit_percentage,2);
    }// end of get profit percent

    public function getSalePriceAttribute()
    {
        $sale_price = $this->price;

        if ($this->in_sale == true) {
            $sale_price =  $this->price - ($this->price * $this->sale / 100); 
        }
        return $sale_price;
    }
   

  
}
