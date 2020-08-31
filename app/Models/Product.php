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



    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function productimage()
    {
        return $this->hasMany(Productimage::class);
    }

    public function getProfitPercentageAttribute()
    {
        $profit = $this->sale_price - $this->perchase_price ;
        $profit_percentage = $profit * 100 / $this->perchase_price ;
        return number_format( $profit_percentage,2);
    }

   

  
}
