<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Productimage extends Model
{
    protected $fillable = [
        'product_id', 'image',
     ];
     protected $appends = ['image_path'];
     public $timestamps = false;



     public function product()
     {
         return $this->belongsTo(Product::class);
     }

     public function getImagePathAttribute()
     {
         return asset('assets/uploads/product_images/'.$this->image);
     }

     
}
